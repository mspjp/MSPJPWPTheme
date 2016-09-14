# install
1. if you do not create Web Apps used WordPress Template and My SQL In App,you need to create it
1. access Web Apps used Kudo tool
1. access debug console in Kudo
1. change console type to CMD (default Powershell)
1. move current directory to "D:\home\site\wwwroot\wp-content"
1. upload mspthemedeploy.bat in this repository to that directory
1. run mspthemedeploy.bat (starting git clone and deploy theme!)

# update
use same method as above "install" (it runs git pull)

# requirements

## plugins

- Advanced Custom Fields
- Crayon Syntax Highlighter
- Custom Post Type Permalinks
- PS Disable Auto Formatting
- WP Masonry Layout
- WP Post Branches
- WP Social Bookmarking Light
- Pz-LinkCard
- TinyMCE Advanced

## permalink settings

### 共通設定

#### カスタム構造
```
http://mspjp.net/%post_id%
```

### Permalink Settings for Custom Post Types

#### info
```
http://mspjp.net/%post_id%
```

#### blog
```
http://mspjp.net/%post_id%
```

#### profile
```
http://mspjp.net/%postname%
```

#### project
```
http://mspjp.net/%postname%
```

#### article
```
http://mspjp.net/%tech%/%post_id%
```
