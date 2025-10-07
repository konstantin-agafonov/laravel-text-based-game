# Используем официальный образ Python
FROM python:slim

# Устанавливаем зависимости для PostgreSQL
RUN apt update && apt upgrade -y && \
    apt install --no-install-recommends -y \
    clang libjpeg-dev \
    libjpeg62-turbo \
    libjpeg62-turbo-dev \
    libwebp-dev \
    zlib1g zlib1g-dev \
    gcc libpq-dev postgresql-client

# Создаём рабочую директорию
WORKDIR /srv/parser

# Копируем requirements
COPY requirements.txt .

# Устанавливаем Python зависимости
RUN pip install --no-cache-dir -r requirements.txt

# Запуск скрипта
CMD ["watchmedo", "auto-restart", "--pattern=*.py", "--recursive", "--", "python", "src/main.py"]
