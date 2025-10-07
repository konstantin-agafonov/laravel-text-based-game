from dataclasses import dataclass

from environs import Env


@dataclass
class DataBaseConfig:
    database_user: str
    database_password: str
    database_host: str
    database_port: int
    database_name: str



@dataclass
class App:
    host: str
    port: int


    

@dataclass
class Config:
    db: DataBaseConfig
    app: App
    debug: bool




def load_config(path: str = None) -> Config:
    env = Env()
    env.read_env(path)

    return Config(
        db=DataBaseConfig(
            database_user=env("POSTGRES_USER"),
            database_password=env("POSTGRES_PASSWORD"),
            database_host=env("POSTGRES_HOST"),
            database_port=env("POSTGRES_PORT"),
            database_name=env("POSTGRES_DB"),
        ),
        app=App(host=env("PARSER_HOST"), port=int(env("PARSER_PORT"))),
        
        
        debug=env.bool("DEBUG", default=False),
    )


def get_settings(base_dir):
    return load_config(base_dir / ".env")
