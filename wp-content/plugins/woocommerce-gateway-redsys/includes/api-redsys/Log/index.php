<?php
/**
 * Silence golden is. May the Force be with you.
 *
 * @package WooCommerce Redsys Gateway.
 * @copyright José Conti
 *
 * ........................................................................................................................................................................................................
 * ........................................................................................................................................................................................................
 * ........................................................................................................................................................................................................
 * ..............................................................................................'',,;;;;;;;;;;,,.'ldl:,...................................................................................
 * ........................................................................................';coxk0KKXXXXXNXXXXXKK0xKMWNOc:;,'..............................................................................
 * ........................................................................................'oKWMMMMMMMMMMMMMMMMMMW00MWWX0KNXKOxoc;'........................................................................
 * ................................................................................... ...  .c0WMWWWWWWWWWWWWWWWWNkOWNNXkKWWMMMWWKx;'''....................................................................
 * .................................................................................       ..'c0WWWWWWWWWWWWWWWWWNkOWWWXk0WWWWWWKx:........................................................................
 * ...............................................................................         ....oXWWWWWWWWWWWWWWWWNkOWWWXk0WWWWWKd:,,'..  ..  ..............................................................
 * ..............................................................................          ... ,OWWWWWWWWWWWWWWWWNkOWNWNk0WWWWN0c'......       ............................................................
 * ............................................................................                .cXWWWWWWWWWWWWWWWNkONXNXk0WWWWNOc.......        ...........................................................
 * ...........................................................................                  'kNWWWWWWWWWWWWWWXxONXNXk0WWWNXO:.......         ..........................................................
 * ..........................................................................                  .,xNNNWWWWWWWWWWWNXxkNKKKk0WWWNN0:......           .........................................................
 * .........................................';cc,'...........................                .:OXWMWWWWWWWWWWNNNNXdkX000x0NNWWW0:.....             ........................................................
 * ..,...'..................................,lddl;..........................             .    cNMMMMMMMMMMMWWWWWWKdkKO0OdOXXNNN0:.....             ........................................................
 *  .;,...,'''..............................:lc:;,'..'.....................             ..    cXMMMMMMMMMMMMMMMWWXxOXKK0xONNNWWNKOd;..              .......................................................
 *   .'.....'',;;,'....................... .';;,;:;..''....................                  .':llllloddxO0XWWMWWNkkNWWWKXMWWWMMMMNd..              .......................................................
  *  ..... .....;::c:;;'..................   ........''''.................              ..                ..,coddOxdXWMN0KWWWWMMMWXx,.              ...............................'.......................
 *         .,.....':llc:;,''.............      ..   .':;'....'''''''...'..             .                         ...':c;;dxdoolcc;...                ..'.'''''''''''........'.....'''..........''..........
 *        .'.... ...','.,,;clc::,,,'''''..         ..,lo;'....''''''''...            .          ...                                                  .''..'''''''''''''''''''''....'''.''''...''''.........
 *        .. .. ............:odxdoldkoll.           .,ldc'..''''''''''...          .        ...                                  .                   .''''''''''''''''''...''''''''''''''''''''''''....'...
 *              ';'.....     ..',;,:dl;,..          ..cdl,.''''''''''''.         ..       ..                     .               .....               .'''''''''''''''''''''''''''''''''''''''''''''''''''''
 * ...         .....,,..      .....'''''...          .'lo;.'''''''''''..        ..       .                                                           ..''''''''''''''''''''''''''''''''''''''''''''''''''''
 * .....       ....;:,,.       .'.........            .lo;''''''''''''..       ..       .                          ...          .                    ..''''''''''''''''''''''''''''''''''''''''''''''''''''
 *   ..  ..     ..,;,''.       .,,.........           .:lc'.''''''''''..      ..       .        .,,,.. .........   .'.           .                   ..''''''''''''''''''''''''''''''''''''''''''''''''''''
 *  .'.. ........','..'. .  .. .,;;'.........      ....'ol'''''''''''..      ..                .o00Ko. .':c::::,.                ..                  ..''''''''''''''''''''''''''''''''''''''''''''''''''''
 *  .,'. ..  .....'........ .'..,;;;;,........    .....'cc,''''''''''.      ..                 ;O000o.  'c::;'.    ...       .......                  .''''''''''''''''''''''''''''''''''''''''''''''''''''
 *  .........','...'.... .. .,. ':;;::'.'........     ..cc,'''''''''..     ..                  .,,,,'....,,,,.   .,,;;;,.    :0XXd.                   .''''''''''''''''''''''''''''''''''''''''''''''''''''
 *  ..    ...;l:,,'',... .. .;. .:;,;:;..;'............'ol,''''''''..     ..                   ....  .lxkOOOOc. .,clcccc;.   .cxOl.                 .  .'''''''''''''''''''''''''''''''''''''''''''''''''''
 *          ..''';'','''... .;' .;:,,;:. .;'...........'c:''''''''..     ..                 .. ....   ,ldO00d.  ,coxxxxl:'    .:l,.                 .. .'''''''''''''''''''''''''''''''''''''''''''''''''''
 *              ..',,':;... .,,. .::,,:;. .,'...... ....,,'''''''..     ..                  .  .....   .;dl,. .,:cdkkkkoc;.  .oXXx,.                 .  .''''''''''''''''''''''''''''''''''''''''''''''''''
 *   ...;cc,.   ..'';l:.... ',. .;c;;::'. .',........';;,'''''''.     ..                   .. ...',..   .   ':;..',:c:,':,. ,0W0o'                  .. .''''''''''''''''''''''''''''''''''''''''''''''''''
 * .....',:loc.  ...,col'... .,.  'cc;:c;.   .'.......,;lc,'''''.     ..                     . ..',;'      .::'          .:;..l0Oc.                   .  .'''''''''''''''''''''''''''''''''''''''''''''''''
 * ';;clc;;;,;,...,;:coo,.,. .,'. .:l:::'..   ........;oxc'''''.     ..                       ...''.     .,c,.            .;:. 'c;.                   .. .,''''''''''''''''''''''''''''''''''''''''''''''''
 * .;cllc:::;;;'..';::co;.;' .''.  ,lll;...     ... ..;oxo,'''.     ..                        ....     .':;.               .;c.  .                    .. .:,'''''''''''''''''''''''''''''''''''''''''''''''
 * ...''.......'' .,:ccoc.',..';.  .col:....      ....:ddc;''.     ..                         ..     .:l:'       .           ,c'                       . .c:'''''''''''''''''''''''''''''''''''''''''''''''
 *            .,,. .clloc..'. ':'. .,cc;. ....     ..'cd:':,..    ..                           .,;..,c,..   .  .lx'  ..       'c,                      .. cl,''''''''''''''''''''''''''''''''''''''''''''''
 *            ......';cl:'.'. .:,.  .;cc. .',,.... .';oo''c,.    ..                            .cl,::'..',;dkc;:OXo,,xd.       .c;                      . ;x:''''''''''''''''''''''''''''''''''''''''''''''
 *               ......',,,,. .:;.  .,cc, .',''.....;ldc.,:;.   ..                              ...',,;:clodxxddkOOOxO0dclxo,.  .:;. ''                 ..'xo''''''''''''''''''''''''''''''''''''''''''''''
 * .              .. ...;cl:. .::. ..'::'.......',..;dx;.,,,'. ..                                          .......''',;:ccloolc;';c;;lo;                 ..dk,','',''''''''''''''''''''''''''''''''''''''''
 * ''''.            ..,,:lol' .;:. ..':c,........'..'od,.'..'...                                                            ............                 ..cOc','',,,,'''''',''''''''''''''''''''''''''''''
 * '''''..        ...';::coo:..';. ..,:l;...'.......'lo,....',.                                                                                           .'kx,',,,,,,,,''',,,'''''''''''''''''''''''''''''
 * '''...     ....';;clc:cllc'..,....;cl:...''......'lo,.....,.                                                               ...                         ..d0:',',,,,,,,,',,,,,,,,,,,,,,,,,,,,''''''''''''
 * ''..  .........',:clc;':c:;..''...:lo:...'.'.....,oo,....';.                                                              ...                          ..:0o'',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'',,,,,''''
 * ''.. ..',,;cccccc::::;';:;;......':lc,..,'.'.....:xo'....'l,                                                                  .                         .'kk;',',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ''.....,;,;::cc;,'',,'';,.'......':c;..',...,,..,okc.....;xo.                                                                 ..                          c0c'',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ''...............      ...........'....'....,;.'cdo'.....lkxc.                                                                ';                          .kd,',,',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * '''...                     ............... .;,.;:;......;kOxd:.                                                        .      ;:                           :x;',''',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ''''''...                     ...     ... .....'...... .lOxdxd;                                                               ;;                           .:c'''',,,',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * '''''''''....                             ..............dkoodxo.                                                        .     .                             .;,''',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * '''''''''''..                                 .''......cxl:cdkx:.....'','''.....                                        ..                                  .,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * '''',,,''''.  .                                .......:oc,,cdkxo;,;;;;,,'..........                                                                         .,,,,,,,,,,,,,,,,,,,,,,,,,,',,,,,,,,,,,,,,,,
 * '''',,''''..                                   ......,:;..'cxxdxc''..''''''''...                                                                           .',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ''',,,'','. .                                 ......''....,ldooko;c:;,'....',,;;,'..                   .''''..                                            .',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,,''''. ..                               ............':llcokxc:c:;,'........'''..                 .;cllcc;.                                          .',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,''''.. .            .                     .........',::;:oOOd:,''........... ......              ..';:cc,   .,:clo;                               ..,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,''''...                                   .........,,,',:dOOxo;;c::;;,''....     ......               ...   ,OWWWMk.                            ..,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,'''''...                                     ......''..',cdOOxdc:lodxkkkkxdol:;'...  ..,,'.                  .:xKNW0'                         ..',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,'''',..                                      ..........';cdkxoxc.   ...';:cloodxxdol:;'',;;;,.                  .,ll.                     ...',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,',,,..                                       .........,;cdxlcxl.             ...',;::cccc:cllc;,'.                    .... ..       ...'',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,'',,',','.   .                                   ........',;loc;lxc....  .......           ...''',;:cc:;..                'colldxl,''.   ..,:c::;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,,,','.                                     ...........';c:',odc'..,;,...',,,,''''.....            .........        .....,cddxkOxoc.    ..,collc:,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,',,'',',,.           .                         ...........',,..;oo;.  ..,:c:,;cllllcccccc::,.       ....               ..''..':ccoxOkxo,.  .  .:oooddl:,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ',,,,,,,,:'.                                      .............'cl:.       .;ccclodddddodddool,.     .':cc:::;,,'.           ....',;;cooo:.      .:lodxdol;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,''',,,c;...                                       ...........;:::. .....    .;codxxxxxxxxddddl'   ....cddddddool;. ..           .',,,,''..........;oxddkxo:,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,',,,:'  ...      .                               ...........';cl'..'...      .,lxxxxxxxxxddxkd;.     .:xkxxxxxxdo;...      ..   .;lc:;'.......'.  .;oddxkxo:,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,,;.    ...       .    ....                    ............,:ll;..,...        'lxxkkkkkkkkkkkxc.      ,dkkkkkkkxxl....          .:xxdo;.....       .,coddxxdc;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,;'      ....   .                            .......... .,;;.':;......         'oxkkkkkOkOOkOOkl,.     'dOOOOkkkkkd,..           .;xkkx:;cc.          .:oodkOkl;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,',;.        .....                             ...      .','.''''...',,'          'okkkkkOOkOOOOOOko.     'dOOOOkkOOkx:...          .;xkkkddxo'           .:oddO0xc,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,'          .......     ..                         ..''.   ..,..,,',,'           'odkOOOOOOOOkOOOOo.     'dOOOOOOOOOkc...          .:xkkkddkd'            .:odk0Oo;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,.           .  ......        ......            ...''.     ..'..','''.            ,lxOOOOOOOOOOOOOkl.     ,xOOOOOOOOOkl,..          .:kOOkdxkd'  .   .''.   .:dk0Oo;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,,.        .          ..........           ........  ..      .'...'....             ;okOOOkxkOOOOOOOk:. .  .:kOOOOOOOOkxl,..          .ckOOkdxOo' .    .;c'.   .ck0Oo;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,'.       .                 ...................       ..    .'..  .....             .:xkOOkxkOOOOOOOOx,.... .lOOOOOOOOOOkl,..          .:dkOkxkko..     .coc,.   ,dOOo;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,.       .                                             ..   ..........               .cdkOOOOOOOOOOOOOo. ... 'dOOOOOOOOOOxc,..  .  .    'oOOOxokkc.. .   'oxoc'   .:kkl;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,.                                                      ..   .........    .           'lxkOOOOOOOOOOOOk:. ....:kOOOOOOOOOOx;... .....   .;dkOOkkOx:...    ;dxdo'    ,xxc,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,,.                                                       .                ..           ;dkOOOOOOOOOOOOOd' ... .oOOOOOOOOOOko'... .....   .ckOOOOOOd;.. .  .cxxxo.    'xx:,;,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,.       ..                                               .                ...          .cdxOOOOOOOOOOOOkc. ....,xOOOOOOOOOOk:..........  .'dkOOOOOOo,.. .  .okkxl...  ,xd;,,,,,,,,,,;,,,,,,,,,,,,,,,,
 * ,,,.       .                                                                  ..           ..':codkOOOOOOOOx,......lOOOOOOOOOOOd'.........   .:kOOOOkOkl.. ..  ;xkkx:.cl. ;xl,,,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,,.                                                                          ..                 ...',;:lodxc. ....;xOOOOOOOOOOkl..........  .'okOOOkOOx;..... .ckkkd''kx. :dc,,,,,,,,,,,,,,,,,,,,;,,,,,
 * ,;,.                                                                           ..                         ...      .lOOOOOOOOOOOx,.........  ..;dOOOOOOkd,....  'dkkkc.c0:  cd:,,,,,,,,,,,,,,,,,,,,,,,,,
 * ,;'    .. .                                                           ..        .                                   .,lxkkkOOOOOOl.......... ..'dOOOOOOOkc..... .:xkkx,.kk. .lo;,,,,,,,,,,,,,,,,,,,,,,,,
 * ,,.    .. .                                                           ... .                                            ....;oxOOOx,.... ........ckOOOOOOOx;....  .okxkl.cKl  'oc,,,,,,,,,,,,,,,,,,,,,,,,
 * ,'.    . ..                                                           .'. ..                                                 .';coc.............,dOOOOOOOOl.......;xxxx,'OO'  ;o:,,,,,,;,,,,,,,,,,,,,,,,
 * ,.       ..                                                          .''..'..                                                  ....     .........:xOOOOOOOk:.......lxxkc.lO,   :o;,,,,,,,,,,,,,,,,,,,,,,
 * ,.      ...                                                          .''..'...                                                 .....        ......lkOOOO0OOx,......,ccc;...    .cc,,,,,,,,,,,,,,,,,,,,,,
 * '.     ...                                                            ...',''''..                                              ...''''.          .lkOkxkOOOko. ...   .;:,.      .l:,,,,,,,,,,,,,,,,,,,,,
 * '.     ..           .                                                 ...';;,,,,.                                               ...'','''.        .',;,;loool,...     'c:'       'c;,,,,,,,,,,,,,,,,,,,,
 * .      ..           ..                                                . .',,,,;,.                                               ...''',,,.   ..   .       .  ....     .,c:'       ,c;,,,,,,,,,,,,,,,,,,,
 * .      ..           ..                                                .  ..''','..'.                                             ...'',,,..  ..  ..   .   .  ....      .:c;.       ';,,,,,,,,,,,,,,,,,,,
 * .      ..           ..                                               ..   ...''. .''.                                            .. .,,,,'.. ..  ...        .''..       ,::,.       .,,,,,,,,,,,,,,,,,,,
 * .     ..            ..                                               ..   ...,'  .'...                                            .. .'',,.  ..  ...  .     ..'.        .::;'        ';,,,,,,,,,,,,,,,,,
 * .     ..             .                                               .    ...',  ....                                              .........                ....        .;:;;.       .',,,,,,,,,,,,,,,,,
 * .     ..  .          ..                                                    ..''..'.                                                ..  ...........................       .c;;,        .,,,,,,,,,,,,,,,,,
 * .     ..             ..                                                     .....;;..                                               . .c;..........................      .:c,;.        .,,,,,,,,,,,,,,,,
 *       ..             .                                                       .  .,,,..                                              . .dc.................... .::.        'l',,         ',,;,,,,,,,,,,,,
 *      ...                                                                         .....                                                .oc..:, ';,,,;,'....... .do.        .c;.;.         ';;;;,,,,,,,,,,
 *      ..                                                                          .....                                                'l;.... .....''...;:;'. .oc..        ,c.,'         .,;,,;;;;;;;;;,
 *      '.                                                                     ..   .....                                                'c. ....... ... .;oxo;. .l;..        .:,.,.         .,;,;;;;;;;;;;
 *     .'.                                                                     .  .......                                                ,l'............ .'clc,. .o:.          ,:.,.          .;;,;;;;;;;;;
 *     .'.                                                            .        .   ......                                                ,d:.'c'.''.........'... .o:..         .c'',          .';,,,;;;;;;;
 */