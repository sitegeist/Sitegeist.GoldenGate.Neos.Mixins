# Sitegeist.GoldenGate.Neos.Mixins
## NodeType Mixins for accessing Shopware data from Neos

*THIS IS EXPERIMENTAL CODE. EVERYTHING IN HERE MAY CHANGE AND MAY EVEN
BE TOTALLY ABANDONED. IF YOU WANT TO USE FOR A PROJECT THIS CONTACT US
FOR MORE INFORMATIONS OR CREATE A PERSONAL FORK.*

This package contains Mixin-NodeType to reference single Shopware
products or lists of Shopware products and matching Fusion prototypes
to get the DTOs for rendering.

*This package is intended to be be used in depending packages and has no
frontend or non-abstract nodes that can be used directly.*

### Authors & Sponsors

* Martin Ficzel - ficzel@sitegeist.de

*The development and the public-releases of this package is generously
sponsored by our employer http://www.sitegeist.de.*

## NodeType Mixins

Abstract nodeTypes that can be used to reference a Shopware Product or a
list of products from Neos.

- `Sitegeist.GoldenGate.Neos.Mixins:Shopware.Product`
- `Sitegeist.GoldenGate.Neos.Mixins:Shopware.Products`

## Fusion Prototypes

This prototypes are components that accept a node that has the identical
named mixin as supertype and return the dto ob

- `Sitegeist.GoldenGate.Neos.Mixins:Shopware.Product`
- `Sitegeist.GoldenGate.Neos.Mixins:Shopware.Products`

## DataSources

This data sources are used internally by the nodeTypes to provide the
select-options. Offcourse they can be used independently aswell.

- `SitegeistGoldenGate_Shop`
- `SitegeistGoldenGate_Product`
- `SitegeistGoldenGate_Category`
- `SitegeistGoldenGate_FilterGroupOption`

## Installation

THIS PACKAGE IS NOT YET PUBLISHED.

## Contribution

We will gladly accept contributions. Please send us pull requests.