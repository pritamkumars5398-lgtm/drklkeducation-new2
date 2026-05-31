#!/bin/bash
# Hostinger Interactive Deployment Script for CodeIgniter 4
# Path: /Users/rajesh/Documents/untitled folder/drlkeducation1/hostinger_deploy.sh

# Exit immediately if a command exits with a non-zero status
set -e

LOCAL_DIR="/Users/rajesh/Documents/untitled folder/drlkeducation1"
cd "$LOCAL_DIR"

clear
echo "=========================================================="
echo "      🚀 HOSTINGER DEPLOYMENT WIZARD FOR CODEIGNITER 4    "
echo "=========================================================="
echo "This script will:"
echo "1. Set up a secure production .env file"
echo "2. Upload your entire project (including vendor/) to Hostinger"
echo "3. Prepare the database migration script"
echo "=========================================================="
echo ""

# --------------------------------------------------------------------
# 1. GATHER FTP CREDENTIALS
# --------------------------------------------------------------------
echo "📡 STEP 1: Enter Hostinger FTP Connection Details"
echo "----------------------------------------------------------"
read -p "FTP Hostname [ftp.drlkfoundation.com]: " FTP_HOST
FTP_HOST=${FTP_HOST:-ftp.drlkfoundation.com}

read -p "FTP Username: " FTP_USER
if [ -z "$FTP_USER" ]; then
    echo "❌ Error: FTP Username is required!"
    exit 1
fi

# Secure password input
read -sp "FTP Password: " FTP_PASS
echo ""
if [ -z "$FTP_PASS" ]; then
    echo "❌ Error: FTP Password is required!"
    exit 1
fi

read -p "Remote Subfolder [/public_html]: " REMOTE_DIR
REMOTE_DIR=${REMOTE_DIR:-/public_html}

echo ""

# --------------------------------------------------------------------
# 2. GATHER DATABASE CREDENTIALS
# --------------------------------------------------------------------
echo "🗄️ STEP 2: Enter Hostinger Live MySQL Database Details"
echo "----------------------------------------------------------"
echo "(Create this first in Hostinger hPanel -> Databases -> MySQL Databases)"
read -p "MySQL Hostname [localhost]: " DB_HOST
DB_HOST=${DB_HOST:-localhost}

read -p "MySQL Database Name (e.g. u123456789_drlk): " DB_NAME
if [ -z "$DB_NAME" ]; then
    echo "❌ Error: Database Name is required!"
    exit 1
fi

read -p "MySQL Username (e.g. u123456789_drlkuser): " DB_USER
if [ -z "$DB_USER" ]; then
    echo "❌ Error: Database Username is required!"
    exit 1
fi

read -sp "MySQL Password: " DB_PASS
echo ""
if [ -z "$DB_PASS" ]; then
    echo "❌ Error: Database Password is required!"
    exit 1
fi

read -p "Base URL [https://drlkfoundation.com/]: " BASE_URL
BASE_URL=${BASE_URL:-https://drlkfoundation.com/}

echo ""

# --------------------------------------------------------------------
# 3. WRITE PRODUCTION .env FILE
# --------------------------------------------------------------------
echo "⚙️ STEP 3: Generating Production .env File..."
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
# DATABASE
#--------------------------------------------------------------------
database.default.hostname = ${DB_HOST}
database.default.database = ${DB_NAME}
database.default.username = ${DB_USER}
database.default.password = ${DB_PASS}
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
EOT

echo "✅ Local .env file successfully updated for Hostinger!"
echo ""

# --------------------------------------------------------------------
# 4. UPLOAD FILES VIA FTP
# --------------------------------------------------------------------
echo "📤 STEP 4: Uploading Files to Hostinger ($REMOTE_DIR)..."
echo "This will upload your source code, vendors, database schemas, and installer."
echo "Please wait, this might take a few minutes..."
echo "----------------------------------------------------------"

# Ensure vendor folder exists before uploading
if [ ! -d "$LOCAL_DIR/vendor" ]; then
    echo "⚠️ Warning: vendor/ folder is missing! Installing composer dependencies first..."
    if command -v php &> /dev/null && [ -f "$LOCAL_DIR/composer.phar" ]; then
        php "$LOCAL_DIR/composer.phar" install --no-dev --optimize-autoloader --ignore-platform-reqs
    else
        echo "❌ Error: vendor/ folder is missing and composer.phar is not found or PHP is not installed!"
        echo "Please install composer dependencies first."
        exit 1
    fi
fi

# Detect transfer tool
if command -v lftp &> /dev/null; then
    echo "⚡ lftp detected! Starting high-speed parallel upload..."
    lftp -c "
    open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
    mirror -R --parallel=10 \
      --exclude .git/ \
      --exclude tests/ \
      --exclude builds/ \
      --exclude writable/cache/ \
      --exclude .DS_Store \
      --exclude ftp_upload.sh \
      --exclude upload_vendor.sh \
      '$LOCAL_DIR' $REMOTE_DIR
    bye
    "
else
    echo "🐌 lftp not found. Using curl for single-connection upload..."
    find "$LOCAL_DIR" \
        -not -path "*/.git/*" \
        -not -path "*/tests/*" \
        -not -path "*/builds/*" \
        -not -path "*/writable/cache/*" \
        -not -name ".DS_Store" \
        -not -name "ftp_upload.sh" \
        -not -name "upload_vendor.sh" \
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
echo "=========================================================="
echo "🎉 DEPLOYMENT FILES UPLOADED SUCCESSFULLY! 🎉"
echo "=========================================================="
echo ""
echo "👉 FINAL STEP TO COMPLETE YOUR DEPLOYMENT:"
echo "1. Open your web browser."
echo "2. Visit: ${BASE_URL}db_import_hostinger.php"
echo "3. The page will connect, import the SQL, and delete itself for security!"
echo ""
echo "If you have any issues, check that files are uploaded to Hostinger public_html."
echo "=========================================================="
