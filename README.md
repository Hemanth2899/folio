# Hemanth portfolio (Vercel)

Files: index.html (site), api/contact.js (backend), package.json.

## Deploy
1. Push this folder to a GitHub repo, then import it at vercel.com/new (or run `npx vercel` in the folder).
2. In Vercel: Project > Settings > Environment Variables, add the values below, then Redeploy.

## Get notified (use either or both)
Email: create a free account at resend.com, make an API key.
  RESEND_API_KEY = your key
  NOTIFY_EMAIL   = the email you signed up to Resend with (yarragudihemanth9@gmail.com)
Phone push: in Telegram, message @BotFather > /newbot, copy the token. Send any message to your bot,
then open https://api.telegram.org/bot<TOKEN>/getUpdates and copy chat > id.
  TELEGRAM_BOT_TOKEN = token
  TELEGRAM_CHAT_ID   = your chat id

Test locally: `npx vercel dev`.
