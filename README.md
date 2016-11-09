# api_telegram_client_sender

Recieve message and forward to python script how calls command-line telegram client.

##Installation: 

  Telegram: https://github.com/vysheng/tg
  
  Apache (tested with v2.4.10 (Raspbian))
  
  PHP (tested with v5.6.27) 
  
  Python (tested with v2.7.9)

##Protocol:
  Http request `./sendMessage.php` with JSON String -->  `{"user":"user_name","msg":"message_text"}`


