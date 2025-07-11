#!/bin/bash
set -e

echo "=== Container Starting ==="
echo "Running initialization script..."

# Ensure init script is executable
chmod +x /usr/local/bin/init.sh

# Execute init script
if /usr/local/bin/init.sh; then
    echo "=== Initialization completed successfully ==="
else
    echo "=== Initialization failed ==="
    exit 1
fi

# If we get here, everything went well
echo "=== Container ready ==="
