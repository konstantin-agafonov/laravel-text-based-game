import geopandas as gpd
from shapely.geometry import Point
from pathlib import Path


SCRIPT_DIR = Path(__file__).parent.resolve()
REGIONS_PATH = SCRIPT_DIR / "RF" / "admin_4.shp"


regions = gpd.read_file(REGIONS_PATH)

if regions.crs != "EPSG:4326":
    regions = regions.to_crs("EPSG:4326")


#блять, я 20 минут искал ошибку, а сам же сначала ввожу долготу, а потом широту, сука
def find_region(lon: float, lat: float, field: str = "name") -> str | None:
    if not (-180 <= lon <= 180):
        raise ValueError("[-180, 180]")
    if not (-90 <= lat <= 90):
        raise ValueError("[-90, 90]")

    point = Point(lon, lat)


    possible_idxs = list(regions.sindex.query(point, predicate="intersects"))
    candidates = regions.iloc[possible_idxs]

    for _, row in candidates.iterrows():
        if row.geometry.contains(point) or row.geometry.touches(point):
            return row[field]

    for _, row in regions.iterrows():
        if row.geometry.contains(point) or row.geometry.touches(point):
            return row[field]

    return None

