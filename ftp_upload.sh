#!/bin/bash
# FTP Upload script for drlkeducation1 → InfinityFree
# Run this from your Mac Terminal

FTP_HOST="ftpupload.net"
FTP_USER="if0_42009009"
FTP_PASS="dMQk9QkeTognvP"
LOCAL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REMOTE_DIR="/htdocs"

echo "🚀 Starting upload to InfinityFree..."
echo "This will upload your project to ftpupload.net/htdocs"

# Use lftp if available, otherwise use curl
if command -v lftp &> /dev/null; then
    lftp -c "
    open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
    mirror -R --parallel=5 --exclude .git/ --exclude tests/ '$LOCAL_DIR' $REMOTE_DIR
    bye
    "
else
    # Use curl to upload files one by one
    find "$LOCAL_DIR" \
        -not -path "*/.git/*" \
        -not -path "*/tests/*" \
        -not -path "*/writable/cache/*" \
        -not -name ".DS_Store" \
        -type f | while read file; do
        
        relative="${file#$LOCAL_DIR/}"
        remote_path="ftp://$FTP_HOST$REMOTE_DIR/$relative"
        remote_dir=$(dirname "$relative")
        
        echo "Uploading: $relative"
        curl -s --ftp-create-dirs \
             --user "$FTP_USER:$FTP_PASS" \
             -T "$file" \
             "ftp://$FTP_HOST$REMOTE_DIR/$relative"
    done
    echo "✅ Upload complete!"
fi
