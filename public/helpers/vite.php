<?php
/**
 * Viteに必要なエントリを出力
 *
 * Wordpressで利用する場合は、以下の例を参考にしてください。
 * https://github.com/wp-bond/bond/blob/master/src/Tooling/Vite.php
 * https://github.com/wp-bond/boilerplate/tree/master/app/themes/boilerplate
 */
function vite(string $entry): string
{
    return "\n" . jsTag($entry)
        . "\n" . jsPreloadImports($entry)
        . "\n" . cssTag($entry)
        . "\n";
}

// 開発環境/プロダクションの判定
// viteを起動していない（http://vite:3000がない）場合、
// manifest.jsonから本番用ファイルをロードするための判定関数。
function isDev(string $entry): bool
{
    static $exists = null;
    if ($exists !== null) {
        return $exists;
    }
    $handle = curl_init('http://vite:3000/' . $entry);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_NOBODY, true);

    curl_exec($handle);
    $error = curl_errno($handle);
    curl_close($handle);

    return $exists = !$error;
    // return true;
}


// Helpers to print tags

function jsTag(string $entry): string
{
    $url = isDev($entry)
        ? 'http://localhost:3000/' . $entry
        : assetUrl($entry);

    if (!$url) {
        return '';
    }
    return '<script type="module" crossorigin src="'
        . $url
        . '"></script>';
}

function jsPreloadImports(string $entry): string
{
    if (isDev($entry)) {
        return '';
    }

    $res = '';
    foreach (importsUrls($entry)['file'] as $url) {
        $res .= '<link rel="modulepreload" href="'
            . $url
            . '">';
    }
    return $res;
}

function cssTag(string $entry): string
{
    // not needed on dev, it's inject by Vite
    if (isDev($entry)) {
        return '';
    }

    $tags = '';
    foreach (cssUrls($entry) as $url) {
        $tags .= '<link rel="stylesheet" href="'
            . $url
            . '">';
    }
    foreach (importsUrls($entry)['css'] as $url) {
        $tags .= '<link rel="stylesheet" href="'
          . $url
          . '">';
    }
    return $tags;
}


// Helpers to locate files

function getManifest(): array
{
    $content = file_get_contents(__DIR__ . '/../manifest.json');

    return json_decode($content, true);
}

function assetUrl(string $entry): string
{
    $manifest = getManifest();

    return isset($manifest[$entry])
        ? BASE_URL . $manifest[$entry]['file']
        : '';
}

function importsUrls(string $entry): array
{
    $urls = [];
    $manifest = getManifest();

    if (!empty($manifest[$entry]['imports'])) {
        foreach ($manifest[$entry]['imports'] as $imports) {

            // jsを取得
            $urls['file'][] = BASE_URL . $manifest[$imports]['file'];


            // css あれば配列を取得
            if (!empty($manifest[$imports]['css'])) {
                foreach($manifest[$imports]['css'] as $cssUrl) {
                    $urls['css'][] = BASE_URL . $cssUrl;
                }
            }
        }
    }
    return $urls;
}

function cssUrls(string $entry): array
{
    $urls = [];
    $manifest = getManifest();

    if (!empty($manifest[$entry]['css'])) {
        foreach ($manifest[$entry]['css'] as $file) {
            $urls[] = BASE_URL . $file;
        }
    }
    return $urls;
}

?>