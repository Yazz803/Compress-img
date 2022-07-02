<?php
if (extension_loaded('gd')) {
  print 'gd loaded';
} else {
  print 'gd NOT loaded';
}

phpinfo(); ?>