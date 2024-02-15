1. Run 'docker composer build' (or 'sudo make build' from project directory if you can use Makefiles).
2. Change 'storage' folder permissions.
3. Add '127.0.0.1	jinn2.devs' line to /etc/hosts file (or edit .env APP_URL to localhost or whatever if you don't want to use custom hostname)
4. Run 'docker compose up -d' ('sudo make start')
5. Install packages ('sudo make composer-install')
6. Run migrations & seed
7. Open 'http://jinn2.devs/' (or other hostname you have selected)