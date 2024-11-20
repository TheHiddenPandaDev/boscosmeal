#!/bin/bash

# Cargar variables desde el archivo .env
if [ -f .env ]; then
    source .env
else
    echo "Archivo .env no encontrado. Por favor, cree el archivo .env en este directorio." >&2
    exit 1
fi

# Verificar que el script se ejecuta en la raíz del proyecto
if [ ! -d "wp-content" ]; then
    echo "Este script debe ejecutarse en la raíz del proyecto de WordPress, donde existe la carpeta wp-content." >&2
    exit 1
fi

# Exportar la base de datos
echo "Exportando base de datos..."
mysqldump -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" > "./dump.sql"
if [ $? -eq 0 ]; then
    echo "Base de datos exportada a ./dump.sql"
else
    echo "Error al exportar la base de datos" >&2
    exit 1
fi

# Descargar únicamente la carpeta wp-content y sobrescribir archivos
echo "Descargando la carpeta wp-content..."
lftp -c "
open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST;
cd $FTP_REMOTE_DIR/wp-content;
lcd ./wp-content;
mget -c *;
"
if [ $? -eq 0 ]; then
    echo "Carpeta wp-content descargada en ./wp-content"
else
    echo "Error al descargar la carpeta wp-content" >&2
    exit 1
fi

# Verificar que wp-config.php no se haya descargado accidentalmente
if [ -f "./wp-config.php" ]; then
    echo "Error: wp-config.php se descargó accidentalmente. Borrándolo..."
    rm -f ./wp-config.php
fi

# Reemplazar el dominio en la base de datos usando SQL
echo "Reemplazando el dominio en la base de datos..."
mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" <<SQL
UPDATE nvz_options
SET option_value = REPLACE(option_value, '$OLD_DOMAIN', '$NEW_DOMAIN')
WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE nvz_posts
SET guid = REPLACE(guid, '$OLD_DOMAIN', '$NEW_DOMAIN');

UPDATE nvz_posts
SET post_content = REPLACE(post_content, '$OLD_DOMAIN', '$NEW_DOMAIN');

UPDATE nvz_postmeta
SET meta_value = REPLACE(meta_value, '$OLD_DOMAIN', '$NEW_DOMAIN');
SQL

if [ $? -eq 0 ]; then
    echo "Reemplazo del dominio en la base de datos completado."
else
    echo "Error al reemplazar el dominio en la base de datos." >&2
    exit 1
fi

echo "Proceso completado con éxito."
