#!/bin/bash
find "/Users/rajesh/Documents/untitled folder/drlkeducation1/vendor" -type f | while read file; do
  relative="${file#/Users/rajesh/Documents/untitled folder/drlkeducation1/}"
  echo "Uploading: $relative"
  curl -s --ftp-create-dirs \
       --user "if0_42009009:dMQk9QkeTognvP" \
       -T "$file" \
       "ftp://ftpupload.net/htdocs/$relative"
done
echo "✅ Vendor upload complete!"
