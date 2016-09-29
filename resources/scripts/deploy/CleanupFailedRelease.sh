### Cleanup failed releases - {{ deployment }}
cd {{ project_path }}

# Remove the archive
if [ -f {{ remote_archive }} ]; then
    rm {{ remote_archive }}
fi

# Remove the release directory
if [ -d {{ release_path }} ]; then
    rm -rf {{ release_path }}
fi
