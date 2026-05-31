#!/bin/bash
for dir in cache logs session uploads debugbar; do
  curl -s --user "if0_42009009:dMQk9QkeTognvP" \
       -T "/Users/rajesh/Documents/untitled folder/drlkeducation1/writable/index.html" \
       "ftp://ftpupload.net/htdocs/writable/$dir/.keep"
  echo "Created: writable/$dir"
done
echo "✅ Writable directories created!"
