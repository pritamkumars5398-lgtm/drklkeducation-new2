#!/bin/bash
LOCAL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
find "$LOCAL_DIR/vendor" -type f | while read file; do
  relative="${file#$LOCAL_DIR/}"
  echo "Uploading: $relative"
  curl -s --ftp-create-dirs \
       --user "if0_42009009:dMQk9QkeTognvP" \
       -T "$file" \
       "ftp://ftpupload.net/htdocs/$relative"
done
echo "✅ Vendor upload complete!"
