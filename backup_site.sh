#!/bin/bash

# Load variables from .env file
if [ -f .env ]; then
    source .env
else
    echo "Error: .env file not found. Please create it in this directory." >&2
    exit 1
fi

# Ensure the script is executed in the project root
if [ ! -d "wp-content" ]; then
    echo "Error: This script must be run from the root of the WordPress project, where wp-content exists." >&2
    exit 1
fi

# Export the database from the remote server
echo "Exporting database from the remote server..."
mysqldump -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" > "./dump.sql"
if [ $? -eq 0 ]; then
    echo "Database exported to ./dump.sql"
else
    echo "Error exporting the database" >&2
    exit 1
fi

# Import the database to the local MySQL server
echo "Importing database to the local MySQL server..."
mysql -h "$LOCAL_DB_HOST" -u "$LOCAL_DB_USER" -p"$LOCAL_DB_PASS" "$LOCAL_DB_NAME" < "./dump.sql"
if [ $? -eq 0 ]; then
    echo "Database successfully imported to the local server."
else
    echo "Error importing the database to the local server" >&2
    exit 1
fi

# Download only the wp-content folder and overwrite files
echo "Downloading wp-content folder..."
lftp -c "
open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST;
cd $FTP_REMOTE_DIR/wp-content;
lcd ./wp-content;
mget -c *;
"
if [ $? -eq 0 ]; then
    echo "wp-content folder downloaded to ./wp-content"
else
    echo "Error downloading wp-content folder" >&2
    exit 1
fi

# Ensure wp-config.php is not downloaded accidentally
if [ -f "./wp-config.php" ]; then
    echo "Error: wp-config.php was accidentally downloaded. Deleting it..."
    rm -f ./wp-config.php
fi

# Replace domain in the database using SQL, considering the prefix
echo "Replacing domain in the local database..."
mysql -h "$LOCAL_DB_HOST" -u "$LOCAL_DB_USER" -p"$LOCAL_DB_PASS" "$LOCAL_DB_NAME" <<SQL
UPDATE ${WP_DB_PREFIX}options
SET option_value = REPLACE(option_value, '$OLD_DOMAIN', '$NEW_DOMAIN')
WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE ${WP_DB_PREFIX}posts
SET guid = REPLACE(guid, '$OLD_DOMAIN', '$NEW_DOMAIN');

UPDATE ${WP_DB_PREFIX}posts
SET post_content = REPLACE(post_content, '$OLD_DOMAIN', '$NEW_DOMAIN');

UPDATE ${WP_DB_PREFIX}postmeta
SET meta_value = REPLACE(meta_value, '$OLD_DOMAIN', '$NEW_DOMAIN');
SQL

if [ $? -eq 0 ]; then
    echo "Domain replacement in the local database completed."
else
    echo "Error replacing the domain in the local database." >&2
    exit 1
fi

echo "Process completed successfully."