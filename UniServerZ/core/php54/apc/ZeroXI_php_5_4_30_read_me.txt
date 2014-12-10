#############################################################################
                         Uniform Server Zero XI 
#############################################################################
 26-6-2014
#############################################################################

-----------
Introuction
-----------
 The Uniform Server Zero is designed for portability, emphasis is
 given to reducing code size. The Uniform Server Zero achieves this
 through a modular implementation. Install only modules (plugins)
 you require these are listed in the documentation plugin section:
 ZeroXI_documentation_1_0_7.exe

------------------------
Install module (plugins)
------------------------

 All plugins are installed as follows:
  1) Copy a plugin to folder UniServerZ
  2) Double click on the downloaded plugin
  3) This starts the extraction process
  4) If requested allow overwriting of existing files.

----------------------
Additional Information
----------------------

------------------------------------------------
Installing The Uniform Server XI Zero PHP plugin
------------------------------------------------

The extraction procedure is identical for all plugins, proceed as follows:

1) Download required PHP plugin installation file ZeroXI_php_5_4_*.exe
2) Save to folder UniServerZ.
3) If running, stop Uniform Server.
4) Double click on the above installation file.
   This runs the self extracting archive.
5) If prompted allow overwriting of existing files.
6) If you wish, delete the installation file, it is no longer required.

-----------
PHP version
-----------
Select PHP version required as follows:

1) Ensure Apache is not running.
2) From UniController open PHP drop-down menu.
3) Click Select version button.
4) Click button corresponding to the PHP plugin version required.
5) Start Apache and the new version of PHP will be recognised.

---------------
Security update
---------------
Upgraded SSL to OpenSSL 1.0.1h 

----------------------
Additional Information
----------------------
APC has two extensions contained in folder \core\php54\apc:
 Win XP  : apc_3110_beta_php54_xp.dll
 Win 7,8 : apc_3113_beta_php54_win7_win8.dll - Default

 To use:
   1) Make a copy of the appropriate extension.
   2) Rename the copy created in step 1) to php_apc.dll
   3) Copy php_apc.dll created in step 2) to folder \core\php54\extensions

--------------------------------------o0o------------------------------------
            Copyright 2002-2014 The Uniform Server Development Team
                            All rights reserved.


