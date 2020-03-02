# demo-wp-theme-with-webpack

## Develop

- 開発時は `yarn dev` で SCSS ソースマップ付き CSS を動かす
- 納品時は `yarn build` で minify 版を出力
- ホットリロードは jQuery 処理がリセットされたりして面倒なので設定しない

## Theme

- 開発時はこのディレクトリごと `themes` に設置
- 納品時は `./demo-corporate` を zip で固めるか FTP か CI ツールで放り込めば OK
