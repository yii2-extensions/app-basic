#!/bin/bash
set -euo pipefail

echo "=== Container Starting ==="
echo "Running initialization script..."

# Ensure init script is executable
chmod +x /usr/local/bin/init.sh

# Execute init script; replace the PID 1 shell
exec /usr/local/bin/init.sh

# If we get here, everything went well
echo "=== Container ready ==="
