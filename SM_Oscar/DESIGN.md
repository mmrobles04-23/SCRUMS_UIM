# Design System Inspired by UNAM/FES

## 1. Visual Theme & Atmosphere

This project uses an institutional UNAM-first look. The design operates on a foundation of light surfaces (white + light grays) with **UNAM Blue** (`--unam-azul`, `#1E3C70`) as the primary brand color and **UNAM Gold** (`--unam-dorado`, `#b38c00`) as the accent for emphasis and headings. Department pages may introduce a dynamic accent (`--depto-color`) while keeping UNAM Blue/Gold as the system anchors.

The typography is based on the project default stack from `app.css`: `Helvetica Neue, Helvetica, Arial, sans-serif`. Use Bootstrap's type scale (`h1..h6`, `.small`, `.fw-*`) and keep headings bold for clarity in an academic/institutional context.

What distinguishes this design system is using **CSS variables from `app.css`** (`--unam-azul`, `--unam-dorado`, `--fesa-verde`) together with Bootstrap components and a soft shadow approach. Prefer subtle elevation for cards/sections and consistent border-radius.

**Key Characteristics:**
- Light surfaces with UNAM Blue (`--unam-azul`, `#1E3C70`) as primary brand color
- UNAM Gold (`--unam-dorado`, `#b38c00`) as accent for emphasis and headings
- Typography: `Helvetica Neue, Helvetica, Arial, sans-serif` + Bootstrap utilities
- Color tokens via `app.css` variables (UNAM/FES)
- Three-layer card shadows: border ring + soft blur + stronger blur
- Generous border-radius: 8px buttons, 14px badges, 20px cards, 32px large elements
- Circular navigation controls (50% radius)
- Photography-first listing cards — images are the hero content
- Near-black text (`#222222`) — warm, not cold
- FES Green (`--fesa-verde`, `#0b791d`) for secondary accents

## 2. Color Palette & Roles

### Primary Brand (UNAM)
- **UNAM Blue** (`--unam-azul`, `#1E3C70`): primary headers, navbar/footer, institutional surfaces
- **UNAM Blue (Alt)** (`--azul`, `#003375`): deep surfaces, gradients, emphasis blocks
- **UNAM Gold** (`--unam-dorado`, `#b38c00`): section titles, highlights, key CTAs

### Secondary Institutional (FES)
- **FES Green** (`--fesa-verde`, `#0b791d`): secondary accents when needed

### Dynamic Accent (per Department)
- **Department Accent** (`--depto-color`): changes depending on department context (used in Departamento view)

### Supporting Colors (defined in app.css)
- **Azul Claro** (`--azul-claro`, `#2c4a7a`)
- **Dorado (alias)** (`--dorado`, `#b38c00`)
- **Verde** (`--verde`, `#2e6b3e`)
- **Verde Secundario** (`--verde-sec`, `#4c8c6b`)

### Text Scale
- **Near Black** (`#222222`): primary text — warm, not cold
- **Focused Gray** (`#3f3f3f`): focused state text
- **Secondary Gray** (`#6a6a6a`): Secondary text, descriptions
- **Disabled** (`rgba(0,0,0,0.24)`): disabled state
- **Link Disabled** (`#929292`): disabled links

### Interactive
- **Info/Links**: use UNAM Blue (`--unam-azul`, `#1E3C70`) or Bootstrap `link-primary` depending on context
- **Border Gray** (`#c1c1c1`): Border color for cards and dividers
- **Light Surface** (`#f2f2f2`): Circular navigation buttons, secondary surfaces

### Surface & Shadows
- **Pure White** (`#ffffff`): Page background, card surfaces
- **Card Shadow** (`rgba(0,0,0,0.02) 0px 0px 0px 1px, rgba(0,0,0,0.04) 0px 2px 6px, rgba(0,0,0,0.1) 0px 4px 8px`): Three-layer warm lift
- **Hover Shadow** (`rgba(0,0,0,0.08) 0px 4px 12px`): Button hover elevation

## 3. Typography Rules

### Font Family
- **Primary**: `Helvetica Neue, Helvetica, Arial, sans-serif`
- **Guideline**: Use Bootstrap font-size utilities (`.small`, `.fs-*`) and weights (`.fw-*`) to standardize typography

### Hierarchy

| Role | Font | Size | Weight | Line Height | Letter Spacing | Notes |
|------|------|------|--------|-------------|----------------|-------|
| Section Heading | Helvetica/Arial | 28px (1.75rem) | 700 | 1.43 | normal | Primary headings |
| Card Heading | Helvetica/Arial | 22px (1.38rem) | 600 | 1.18 (tight) | normal | Category/card titles |
| Sub-heading | Helvetica/Arial | 21px (1.31rem) | 700 | 1.43 | normal | Bold sub-headings |
| Feature Title | Helvetica/Arial | 20px (1.25rem) | 600 | 1.20 (tight) | normal | Feature headings |
| UI Medium | Helvetica/Arial | 16px (1.00rem) | 500 | 1.25 (tight) | normal | Nav, emphasized text |
| UI Semibold | Helvetica/Arial | 16px (1.00rem) | 600 | 1.25 (tight) | normal | Strong emphasis |
| Button | Helvetica/Arial | 16px (1.00rem) | 500 | 1.25 (tight) | normal | Button labels |
| Body / Link | Helvetica/Arial | 14px (0.88rem) | 400 | 1.43 | normal | Standard body |
| Small | Helvetica/Arial | 13px (0.81rem) | 400 | 1.23 (tight) | normal | Descriptions |
| Tag | Helvetica/Arial | 12px (0.75rem) | 400–700 | 1.33 | normal | Tags, labels |
| Badge | Helvetica/Arial | 11px (0.69rem) | 600 | 1.18 (tight) | normal | Badges |

### Principles
- **Weight range**: prefer 500–700 for headings and key UI to keep an institutional tone.
- **Negative tracking on headings**: -0.18px to -0.44px letter-spacing on display creates intimate, cozy headings rather than cold, compressed ones.
- **Consistency**: use Bootstrap's typography utilities consistently across admin screens.

## 4. Component Stylings

### Buttons

**Primary Dark**
- Background: `#222222` (near-black, not pure black)
- Text: `#ffffff`
- Padding: 0px 24px
- Radius: 8px
- Hover: transitions to UNAM Gold (`--unam-dorado`, `#b38c00`) accent
- Focus: use Bootstrap focus ring utilities (or `outline`/`box-shadow` with UNAM Blue)

**Circular Nav**
- Background: `#f2f2f2`
- Text: `#222222`
- Radius: 50% (circle)
- Hover: shadow `rgba(0,0,0,0.08) 0px 4px 12px` + translateX(50%)
- Active: 4px white border ring + focus shadow
- Focus: scale(0.92) shrink animation

### Cards & Containers
- Background: `#ffffff`
- Radius: 14px (badges), 20px (cards/buttons), 32px (large)
- Shadow: `rgba(0,0,0,0.02) 0px 0px 0px 1px, rgba(0,0,0,0.04) 0px 2px 6px, rgba(0,0,0,0.1) 0px 4px 8px` (three-layer)
- Listing cards: full-width photography on top, details below
- Carousel controls: circular 50% buttons

### Inputs
- Search: `#222222` text
- Focus: subtle UNAM Blue ring (e.g. `0 0 0 0.25rem rgba(30, 60, 112, 0.25)`) or Bootstrap focus ring
- Radius: depends on context (search bar uses pill-like rounding)

### Navigation
- White sticky header with search bar centered
- UNAM logo (UNAM Blue) left-aligned
- Category filter pills: horizontal scroll below search
- Circular nav controls for carousel navigation
- User menu/avatar right-aligned

### Image Treatment
- Listing photography fills card top with generous height
- Image carousel with dot indicators
- Heart/wishlist icon overlay on images
- 8px–14px radius on contained images

## 5. Layout Principles

### Spacing System
- Base unit: 8px
- Scale: 2px, 3px, 4px, 6px, 8px, 10px, 11px, 12px, 15px, 16px, 22px, 24px, 32px

### Grid & Container
- Full-width header with centered search
- Category pill bar: horizontal scrollable row
- Listing grid: responsive multi-column (3–5 columns on desktop)
- Full-width footer with link columns

### Whitespace Philosophy
- **Travel-magazine spacing**: Generous vertical padding between sections creates a leisurely browsing pace — you're meant to scroll slowly, like browsing a magazine.
- **Photography density**: Listing cards are packed relatively tightly, but each image is large enough to feel immersive.
- **Search bar prominence**: The search bar gets maximum vertical space in the header — finding your destination is the primary action.

### Border Radius Scale
- Subtle (4px): Small links
- Standard (8px): Buttons, tabs, search elements
- Badge (14px): Status badges, labels
- Card (20px): Feature cards, large buttons
- Large (32px): Large containers, hero elements
- Circle (50%): Nav controls, avatars, icons

## 6. Depth & Elevation

| Level | Treatment | Use |
|-------|-----------|-----|
| Flat (Level 0) | No shadow | Page background, text blocks |
| Card (Level 1) | `rgba(0,0,0,0.02) 0px 0px 0px 1px, rgba(0,0,0,0.04) 0px 2px 6px, rgba(0,0,0,0.1) 0px 4px 8px` | Listing cards, search bar |
| Hover (Level 2) | `rgba(0,0,0,0.08) 0px 4px 12px` | Button hover, interactive lift |
| Active Focus (Level 3) | `rgb(255,255,255) 0px 0px 0px 4px` + focus ring | Active/focused elements |

**Shadow Philosophy**: This design system's three-layer shadow system creates a warm, natural lift. Layer 1 (`0px 0px 0px 1px` at 0.02 opacity) is an ultra-subtle border. Layer 2 (`0px 2px 6px` at 0.04) provides soft ambient shadow. Layer 3 (`0px 4px 8px` at 0.1) adds the primary lift. This graduated approach creates shadows that feel like natural light rather than CSS effects.

## 7. Do's and Don'ts

### Do
- Use `#222222` (warm near-black) for text — never pure `#000000`
- Apply UNAM Blue (`--unam-azul`, `#1E3C70`) only for primary headers and brand moments — it's the singular anchor
- Use the project font stack consistently and keep headings at 500–700 weight
- Apply the three-layer card shadow for all elevated surfaces
- Use generous border-radius: 8px for buttons, 20px for cards, 50% for controls
- Use photography as the primary visual content — listings are image-first
- Apply negative letter-spacing (-0.18px to -0.44px) on headings for intimacy
- Use circular (50%) buttons for carousel/navigation controls

### Don't
- Don't use pure black (`#000000`) for text — always `#222222` (warm)
- Don't apply UNAM Blue to backgrounds or large surfaces — it's an anchor only
- Don't use thin font weights (300, 400) for headings — 500 minimum
- Don't use heavy shadows (>0.1 opacity as primary layer) — keep them warm and graduated
- Don't use sharp corners (0–4px) on cards — the generous rounding (20px+) is core
- Don't introduce additional brand colors beyond the UNAM/FES system
- Don't invent new color tokens — use UNAM/FES variables from `app.css` (and `--depto-color` only where applies)

## 8. Responsive Behavior

### Breakpoints
| Name | Width | Key Changes |
|------|-------|-------------|
| Mobile Small | <375px | Single column, compact search |
| Mobile | 375–550px | Standard mobile listing grid |
| Tablet Small | 550–744px | 2-column listings |
| Tablet | 744–950px | Search bar expansion |
| Desktop Small | 950–1128px | 3-column listings |
| Desktop | 1128–1440px | 4-column grid, full header |
| Large Desktop | 1440–1920px | 5-column grid |
| Ultra-wide | >1920px | Maximum grid width |

### Touch Targets
- Circular nav buttons: adequate 50% radius sizing
- Listing cards: full-card tap target on mobile
- Search bar: prominently sized for thumb interaction
- Category pills: horizontally scrollable with generous padding

### Collapsing Strategy
- Listing grid: 5 → 4 → 3 → 2 → 1 columns
- Search: expanded bar → compact bar → overlay
- Category pills: horizontal scroll at all sizes
- Navigation: full header → mobile simplified
- Map: side panel → overlay/toggle

### Image Behavior
- Listing photos: carousel with swipe on mobile
- Responsive image sizing with aspect ratio maintained
- Heart overlay positioned consistently across sizes
- Photo quality adjusts based on viewport

## 9. Agent Prompt Guide

### Quick Color Reference
- Background: White (`#ffffff`) / light surfaces (`#f2f2f2` when needed)
- Text: Near Black (`#222222`) / secondary gray (`#6a6a6a`)
- Primary brand: UNAM Blue (`--unam-azul`, `#1E3C70`)
- Accent: UNAM Gold (`--unam-dorado`, `#b38c00`)
- Secondary accent: FES Green (`--fesa-verde`, `#0b791d`)
- Dynamic accent (Departamento): `--depto-color`
- Disabled: `rgba(0,0,0,0.24)`
- Card border: `rgba(0,0,0,0.06)` (or Bootstrap border utilities)
- Card shadow: use the project shadow tokens/styles (e.g. soft lift like `0 10px 25px rgba(0, 51, 117, 0.12)`)

### Example Component Prompts
- "Create a card: white background, 20px radius, soft shadow. Header/title in UNAM Gold (`--unam-dorado`). Body text in #222222/#6a6a6a."
- "Design search bar: white background, 32px radius. Search text 14px. Primary action button in UNAM Gold (`--unam-dorado`, `#b38c00`) with white icon and 50% radius."
- "Build navigation pills: horizontal scrollable row. Each pill: 14px weight 600, #222222 text, bottom border on active."
- "Create a CTA button: UNAM Blue (`--unam-azul`, `#1E3C70`) background, white text, 8px radius, 16px weight 500, 0px 24px padding. Hover: UNAM Gold (`--unam-dorado`, `#b38c00`) accent."
- "Design a heart/wishlist button: transparent background, 50% radius, white heart icon with dark shadow outline."

### Iteration Guide
1. Start with white — the photography provides all the color
2. UNAM Gold (`--unam-dorado`, `#b38c00`) is the primary accent — use for CTAs/titles without overpowering the UI
3. Near-black (#222222) for text — the warmth matters
4. Three-layer shadows create natural, warm lift — always use all three layers
5. Generous radius: 8px buttons, 20px cards, 50% controls
6. Keep headings at 500–700 weight — no thin weights for any heading
7. Photography is hero — every listing card is image-first
