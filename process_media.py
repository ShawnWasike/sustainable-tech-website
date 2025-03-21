import os
from datetime import datetime

media_folder = "media/"
for filename in os.listdir(media_folder):
    new_name = f"{datetime.now().strftime('%Y%m%d')}_{filename}"
    os.rename(
        os.path.join(media_folder, filename),
        os.path.join(media_folder, new_name)
    )
    print(f"Renamed {filename} to {new_name}")