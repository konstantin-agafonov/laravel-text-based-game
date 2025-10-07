from fastapi import FastAPI, File, UploadFile
import pandas as pd

from application.utils.parser import parse_file
from application.routers import parser


def _init_routers(app: FastAPI):
    app.include_router(parser.router)
    

def create_app():
    app = FastAPI(
        title='Parser Service',
        docs_url='/api/swagger'
    )
    
    _init_routers(app)

    return app