# Northline Outfitters — Storefront Child Theme

Custom WordPress child theme built on **Storefront** for **Northline Outfitters** (`northline-outfitters`). Designed as a clean, maintainable foundation for WooCommerce storefronts without modifying WordPress core, WooCommerce core, or the parent theme.

## Repository Structure

```text
storefront-child/
├── .gitignore      # Excludes OS metadata, debug logs, and local artifacts
├── functions.php   # Parent style enqueuing and the optional GA4 tag
├── style.css       # Child theme header and shared contrast fixes
└── README.md       # Setup, components, and workflow documentation
```

## Setup

1. Install and activate the **Storefront** parent theme, then upload and activate this child theme.
2. Optional analytics: add this line to the site's `wp-config.php`:

   ```php
   define( 'NORTHLINE_GA4_MEASUREMENT_ID', 'G-XXXXXXX' );
   ```

   Never commit measurement IDs, API keys, or `wp-config.php`.

## Reusable Components

| Component | File | How a new site uses it |
|---|---|---|
| Contrast styles (prices, cart count) | `style.css` | Install the child theme. |
| GA4 tag | `functions.php` | Define `NORTHLINE_GA4_MEASUREMENT_ID` in `wp-config.php`. No plugin needed. |

## Environment Workflow

- **Local:** build and test in LocalWP; code in Git; test credentials and sample data.
- **Staging:** deploy reviewed code from Git; use staging-specific `wp-config.php` values (separate or no GA4 ID, test Stripe keys); validate before release.
- **Production:** back up first; deploy approved code; run a smoke test (home, product, cart, test checkout, admin login).
- **Data:** code moves forward through the environments. The staging database never overwrites live orders or customers.
- **Rollback:** the lead developer approves; restore the pre-deploy backup or revert the Git commit; repeat the smoke test.
