#!/bin/bash
# CodeIgniter 4 Deployment Script: Host on InfinityFree + Domain on Hostinger
# Path: /Users/rajesh/Documents/drkl/drklkeducation-/deploy.sh

# Exit immediately if a command exits with a non-zero status
set -e

LOCAL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$LOCAL_DIR"

clear
echo -e "\033[1;36m==========================================================\033[0m"
echo -e "\033[1;35m  🚀 INFINITYFREE HOSTING + HOSTINGER DOMAIN DEPLOYER    \033[0m"
echo -e "\033[1;36m==========================================================\033[0m"
echo "This script will:"
echo "1. Set up a secure production .env file with your custom domain"
echo "2. Connect and upload all project files to InfinityFree FTP"
echo "3. Help you import the live MySQL database"
echo -e "\033[1;36m==========================================================\033[0m"
echo ""

# --------------------------------------------------------------------
# 1. GET DOMAIN NAME
# --------------------------------------------------------------------
echo -e "\033[1;33m📡 STEP 1: Enter your Custom Domain (from Hostinger)\033[0m"
echo "----------------------------------------------------------"
read -p "Your Domain Name [https://drlkfoundation.com/]: " BASE_URL
BASE_URL=${BASE_URL:-https://drlkfoundation.com/}

# Ensure trailing slash
if [[ ! "$BASE_URL" =~ /$ ]]; then
    BASE_URL="${BASE_URL}/"
fi

echo ""

# --------------------------------------------------------------------
# 2. WRITE PRODUCTION .env FILE
# --------------------------------------------------------------------
echo -e "\033[1;33m⚙️ STEP 2: Generating Production .env File for InfinityFree...\033[0m"
cat <<EOT > "$LOCAL_DIR/.env"
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------
CI_ENVIRONMENT = production

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------
app.baseURL = '${BASE_URL}'
app.forceGlobalSecureRequests = false

#--------------------------------------------------------------------
# DATABASE (InfinityFree)
#--------------------------------------------------------------------
database.default.hostname = sql102.infinityfree.com
database.default.database = if0_42009009_drlkeducation
database.default.username = if0_42009009
database.default.password = dMQk9QkeTognvP
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
EOT

echo -e "\033[1;32m✅ Local .env file successfully configured!\033[0m"
echo ""

# --------------------------------------------------------------------
# 3. UPLOAD FILES VIA FTP
# --------------------------------------------------------------------
FTP_HOST="ftpupload.net"
FTP_USER="if0_42009009"
FTP_PASS="dMQk9QkeTognvP"
REMOTE_DIR="/htdocs"

echo -e "\033[1;33m📤 STEP 3: Uploading Files to InfinityFree FTP...\033[0m"
echo "This will upload your code to ftpupload.net/htdocs"
echo "Please wait, this might take a few minutes..."
echo "----------------------------------------------------------"

# Ensure vendor folder exists before uploading
if [ ! -d "$LOCAL_DIR/vendor" ]; then
    echo -e "\033[1;33m⚠️ Warning: vendor/ folder is missing! Installing composer dependencies first...\033[0m"
    if command -v php &> /dev/null && [ -f "$LOCAL_DIR/composer.phar" ]; then
        php "$LOCAL_DIR/composer.phar" install --no-dev --optimize-autoloader --ignore-platform-reqs
    else
        echo -e "\033[1;31m❌ Error: vendor/ folder is missing and composer.phar is not found or PHP is not installed!\033[0m"
        echo "Please install composer dependencies first."
        exit 1
    fi
fi

# Detect transfer tool
if command -v lftp &> /dev/null; then
    echo -e "\033[1;32m⚡ lftp detected! Starting high-speed parallel upload...\033[0m"
    lftp -c "
    open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
    mirror -R --parallel=10 \
      --exclude .git/ \
      --exclude tests/ \
      --exclude builds/ \
      --exclude writable/cache/ \
      --exclude .DS_Store \
      --exclude ftp_upload.sh \
      --exclude hostinger_deploy.sh \
      --exclude upload_vendor.sh \
      --exclude deploy.sh \
      '$LOCAL_DIR' $REMOTE_DIR
    bye
    "
else
    echo -e "\033[1;33m🐌 lftp not found. Using curl for single-connection upload...\033[0m"
    find "$LOCAL_DIR" \
        -not -path "*/.git/*" \
        -not -path "*/tests/*" \
        -not -path "*/builds/*" \
        -not -path "*/writable/cache/*" \
        -not -name ".DS_Store" \
        -not -name "ftp_upload.sh" \
        -not -name "hostinger_deploy.sh" \
        -not -name "upload_vendor.sh" \
        -not -name "deploy.sh" \
        -type f | while read file; do
        
        relative="${file#$LOCAL_DIR/}"
        echo "Uploading: $relative"
        curl -s --ftp-create-dirs \
             --user "$FTP_USER:$FTP_PASS" \
             -T "$file" \
             "ftp://$FTP_HOST$REMOTE_DIR/$relative"
    done
fi

echo ""
echo -e "\033[1;36m==========================================================\033[0m"
echo -e "\033[1;32m🎉 DEPLOYMENT FILES UPLOADED SUCCESSFULLY! 🎉\033[0m"
echo -e "\033[1;36m==========================================================\033[0m"
echo ""
echo -e "\033[1;33m👉 FINAL STEP TO COMPLETE YOUR DEPLOYMENT:\033[0m"
echo "1. Open your web browser."
echo -e "2. Visit: \033[1;36m${BASE_URL}db_import.php\033[0m"
echo "3. The page will connect, import the SQL to sql102.infinityfree.com, and delete itself for security!"
echo ""
echo -e "\033[1;36m==========================================================\033[0m"
