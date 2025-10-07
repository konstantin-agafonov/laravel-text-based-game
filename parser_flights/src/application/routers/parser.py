from fastapi import APIRouter, File, UploadFile

from application.utils.parser import parse_file


router = APIRouter(prefix='/parser', tags=['Parser'])

@router.post('/upload')
async def upload(file: UploadFile = File(...)):
    contents = await file.read()
    parse_file(file.filename, contents)