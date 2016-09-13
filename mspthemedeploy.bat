//MSPThemeデプロイ用バッチファイル
//リポジトリから変更をpullして反映する

//***使い方***
//kudoでDbug consoleにアクセスしてコマンドプロンプトに切り替える(power shellだと内部エラーが起こる)
//D:\home\site\wwwroot\wp-contentにこのバッチファイルをアップロードし、実行する

@echo off
set TARGET=D:\home\site\wwwroot\wp-content\themes\MSPJPWPTheme
if exist "%TARGET%\" (
// フォルダが存在する
echo "start git pull"
cd D:\home\site\wwwroot\wp-content\themes\MSPJPWPTheme
git pull
) else (
echo "start git clone"
cd D:\home\site\wwwroot\wp-content\themes
git clone https://github.com/mspjp/MSPJPWPTheme.git
)
echo "deploy complete!"