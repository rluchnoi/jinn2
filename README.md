1. Run 'docker composer build' (or 'sudo make build' from project directory if you can use Makefiles).
2. Change 'storage' folder permissions.
3. Add '127.0.0.1	jinn2.devs' line to /etc/hosts file (or edit .env APP_URL to localhost or whatever if you don't want to use custom hostname)
4. Run 'docker compose up -d' ('sudo make start')
5. Install php packages ('sudo make composer-install')
6. Install js packages ('sudo make npm-install && sudo make npm-build')
7. Run migrations & seed (sudo make migrate && sudo make seed)
8. Link the storage (sudo make storage-link)
9. Generate an app key (sudo make key:generate)
10. Open 'http://jinn2.devs/' (or other hostname you have selected)