// ----------------------------------------------------------------------
// Copyright (c) 2005- 2009 by Nile Flores
// PHPurl Version 1.0
// http://blondish.net/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

Install

1. Upload the files to your host.

ATTENTION! The .htaccess file is always placed in the root folder, Even if you place the main files in a subfolder. However, you can offer redirection from a sub-folder (yourdomain.com/sub-folder/shorturl.)

If you install it to a subfolder you have to edit the .htaccess file.

The line:

"RewriteRule ^([a-zA-Z0-9]+)/?$ /go.php?id=$1 [L]"
To
"RewriteRule ^([a-zA-Z0-9]+)/?$ /subfolder/go.php?id=$1 [L]"

2. Open up config.php . Edit the lines with the correct information for your Domain Name and Mysql info, and admin username and password.

ATTENTION! You can only specify the domain name, even if you placed the main files in a subfolder. Again, this also has a stipulation is you want to offer redirection from a sub-folder (yourdomain.com/sub-folder/shorturl.)


3. Run install.php it will create the tables, Remember to delete install.php  when its finished.


4. To login to the admin panel, point your browser to http://www.yourdomain.com/admin/login.php
 
Here you can Add / Edit / Delete urls.



// ----------------------------------------------------------------------
ATTENTION! You can change the layout to anything you want. Just remember to copy and paste the code into the correct spots where you want it to show up on your webpage design.

// ----------------------------------------------------------------------
//
