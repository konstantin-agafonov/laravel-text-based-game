import uvicorn

from application.app import create_app
from configuration.config import get_settings
from pathlib import Path

BASE_DIR = Path(__file__).resolve().parent.parent

config = get_settings(BASE_DIR)


if __name__ == "__main__":
    uvicorn.run(create_app(), host=config.app.host, port=config.app.port)