rem SINCHRONIZATION: 2 click this .bat script (or Git)
rem J:\awww\apl\dev1\01apl\04tema\1_sync_tema_sifrarnik_JtoH.bat
rem
rem robocopy <Original Folder> <Destination Folder> /e /purge
rem **** OUTPUTS EG : *****
rem Total Copied Skipped Mismatch FAILED Extras
rem Dirs : 20 0 20 0 0 0
rem Files : 94 6 88 0 0 0
rem Bytes : 453.9 k 36.6 k 417.2 k 0 0 0
rem Times : 0:00:00 0:00:00 0:00:00 0:00:00
rem
rem Speed : 708811 Bytes/sec. 40.558 MegaBytes/min.
rem Ended : 6. prosinca 2015. 20:33:19

rem 1. resources outside appl. tree - utils, settings, css, img
rem 1.1 
robocopy J:\awww\apl\dev1\config_site.php H:\awww\apl\dev1\config_site.php /e /purge
rem 1.2
robocopy J:\awww\apl\zinc H:\awww\apl\zinc /e /purge

rem 2. inside appl. tree
robocopy J:\awww\apl\dev1\01apl\04tema H:\awww\apl\dev1\01apl\04tema /e /purge

pause