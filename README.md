# Softek Barcode Wrapper

This projects implements a PHP library to wrap the Softek Barcode SDK, a barcode engine developed over at https://www.bardecode.com/en1/

This project is **not** developed by Softek Software Ltd.

## Project Status

This project is developed with the focus of creating a library to be used by [DEXPRO](https://github.com/DEXPRO-Solutions-GmbH?type=source) products.
It covers what these products need of the Softek SDK, not the whole SDK.

Since version 1.0.0, the library follows [Semantic Versioning](https://semver.org/): breaking changes only come with a new major version.

## Development

### Dev Container

This project has a [Dev Container](https://containers.dev/) configuration, which should allow you to open this project in a standardized
development container. See this for details: https://code.visualstudio.com/docs/devcontainers/containers

### Checks

The CI runs the following on PHP 8.1 to 8.5. Run them locally with:

```shell
composer validate --strict
composer update
vendor/bin/psalm --find-unused-psalm-suppress
```

There are no automated tests that scan an image, because they would need the Softek SDK and a license key. When you change
how the library talks to the SDK, scan a few images with the real SDK before you release.

## Requirements

- PHP 8.1 or newer. It is tested on 8.1 to 8.5.
- `ext-ffi` - This package requires FFI. It is listed as suggested dependency, because to prevent failing dependency resolving e.g. in composer projects that provide backwards compatibility
- The shared library and the header file of the Softek SDK, which are not part of this package.

## Releases

Versions follow [Semantic Versioning](https://semver.org/) and are published as Git tags named `vMAJOR.MINOR.PATCH`, e.g. `v1.1.0`.
Pre-releases carry a suffix, e.g. `v1.1.0-rc.1`.

To release:

1. Merge everything that belongs into the release into `main` and wait for the CI to pass.
2. Tag the merge commit and push the tag:

   ```shell
   git switch main && git pull
   git tag -a v1.1.0 -m "v1.1.0"
   git push origin v1.1.0
   ```

The [Release workflow](.github/workflows/release.yml) then checks that the tag is a valid version on `main`, runs the tests of the CI
again and creates a GitHub release with notes generated from the merged pull requests. A tag with a suffix becomes a pre-release.
Nothing in `composer.json` needs to be changed, because Composer reads the version from the tag.

To use a release, add this repository and require a version in your project:

```shell
composer config repositories.softek-barcode-wrapper vcs https://github.com/DEXPRO-Solutions-GmbH/softek-barcode-wrapper
composer require dexpro-solutions-gmbh/softek-barcode-wrapper:^1.0
```