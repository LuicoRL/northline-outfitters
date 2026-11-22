# Northline Outfitters — Storefront Child Theme

Custom WordPress child theme built on **Storefront** for **Northline Outfitters** (`northline-outfitters`). Designed as a clean, maintainable foundation for WooCommerce storefronts without modifying WordPress core, WooCommerce core, or the parent theme.

## Repository Structure

```text
storefront-child/
├── .gitignore      # Excludes OS metadata and debug logs
├── functions.php   # Parent/child style enqueuing and scoped store hooks
├── style.css       # Child theme header and custom CSS overrides
└── README.md       # Setup, architecture, and workflow documentation
```

## Requirements

* **WordPress:** 6.x
* **WooCommerce:** 9.x
* **Parent Theme:** Storefront (installed in `wp-content/themes/storefront`)
* **PHP:** 8.1+

## Local Installation & Setup

1. Ensure the **Storefront** parent theme is installed in `wp-content/themes/storefront` (do not activate the parent theme directly).
2. Clone this repository into your WordPress themes directory as `storefront-child`:
   ```bash
   cd wp-content/themes
   git clone https://github.com/LuicoRL/northline-outfitters.git storefront-child
   ```
3. In **WP Admin → Appearance → Themes**, activate **Storefront Child**.
4. Configure environment-specific credentials (such as Stripe Test/Live keys or analytics IDs) in **WP Admin** or `wp-config.php`—never commit API keys or secrets to this repository.

## Architecture & Development Rules

* **KISS & YAGNI:** Keep all styling and functional hooks strictly scoped to store requirements.
* **Upgrade-Safe Customizations:** Place CSS overrides in `style.css` and PHP hooks/filters in `functions.php` (or modular files inside `inc/`). Never edit `wp-content/themes/storefront` or plugin files directly.
* **No Secrets in Version Control:** Payment gateway keys, database dumps, and `.log` files must remain outside Git.

## Deployment Workflow

1. **Local:** Build and validate changes in LocalWP on feature branches or `main`.
2. **Staging:** Pull the tested child theme build to a staging environment and verify checkout flows, accessibility, and SEO checks against staging data.
3. **Production:** Deploy verified theme changes after taking a full database and file backup, then run smoke tests on product pages, cart, and checkout.