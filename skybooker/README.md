# SkyBooker Theme

SkyBooker is a modern, lightweight WordPress theme tailored for flight booking and ticket sales sites.

## Local Preview

### Option 1: WordPress + PHP (no Docker)
1. Install WordPress locally.
2. Copy the `skybooker` folder into `wp-content/themes/`.
3. Activate **SkyBooker** in **Appearance → Themes**.
4. Create pages:
   - Home (set as **Front Page**)
   - Search Flights (assign template **Search Flights**)
   - Flight Results (assign template **Flight Results**)
   - About Us, Contact, FAQ, Blog
5. Visit your site and use the search form to view flight results.

### Option 2: Docker (official WordPress image)
```bash
docker run --name skybooker-wp -p 8080:80 \
  -e WORDPRESS_DB_HOST=db \
  -e WORDPRESS_DB_USER=wp \
  -e WORDPRESS_DB_PASSWORD=wp \
  -e WORDPRESS_DB_NAME=wp \
  -v "$PWD/skybooker:/var/www/html/wp-content/themes/skybooker" \
  -d wordpress:latest
```

You can use any local database container (e.g., MySQL) and connect it to the WordPress container.

## Theme Setup Notes
- The theme registers a **Flights** custom post type.
- Sample flight entries are seeded on first activation.
- Update menus under **Appearance → Menus**.

