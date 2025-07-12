#!/bin/bash
set -euo pipefail

# Colors for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${BLUE}=== YII2 Web Server Starting ===${NC}"

# Ensure init script is executable
chmod +x /usr/local/bin/init.sh

# Execute init script; replace the PID 1 shell
exec /usr/local/bin/init.sh

# If we get here, everything went well
echo "=== Container ready ==="
