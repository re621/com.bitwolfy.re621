<html>

<head>
    <title>RE621: E621, Re-Imagined</title>
    <link rel="stylesheet" type="text/css" href="./style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest">
</head>

<body>
    <content>
        <header>
            <img src="./assets/logo.png" alt="RE621">
            <header-links>
                <a href="https://github.com/re621/re621/releases">
                    <img src="https://img.shields.io/github/v/release/re621/re621?label=version&style=flat-square"
                        alt="Releases">
                </a>
                <a href="https://github.com/re621/re621/issues">
                    <img src="https://img.shields.io/github/issues/re621/re621?&style=flat-square" alt="Issues">
                </a>
                <a href="https://github.com/re621/re621/pulls">
                    <img src="https://img.shields.io/github/issues-pr/re621/re621?style=flat-square"
                        alt="Pull Requests">
                </a>
                <a href="https://github.com/re621/re621/releases/latest/download/script.user.js">
                    <img src="https://img.shields.io/github/downloads/re621/re621/total?style=flat-square"
                        alt="Download">
                </a>
            </header-links>
        </header>

        <section>
            <p>
                RE621 is a comprehensive set of tools and utilities, designed to enhance the website's functionality for
                both casual and power users.
                It overhauls the UI, simplifies uploading and tagging, and allows you to download entire pools,
                favorites,
                or simply arbitrary collections of posts.
            </p>

            <p>
                The project consists of several different modules that improve the entire site, top to bottom -
                literally.
            </p>

            <p>Keeping the script - and the website - fully functional is my highest priority. If you are experiencing
                bugs or issues, do not hesitate to <a href="https://github.com/bitWolfy/re621/issues">create a support
                    ticket on github</a>, or leave us a message in the <a
                    href="https://e926.net/forum_topics/25872?page=12">forum thread</a>. Feel free to send a
                DM to <a href="https://discordapp.com/users/98976047613108224">@bitWolfy#7932</a> on Discord for
                real-time support, feature discussions, or just to chat. Feature requests, comments, and overall
                feedback are also appreciated.</p>

            <p>Thank you for downloading and using this script. I hope that you enjoy the experience.</p>
        </section>

        <section>
            <h1>Installation</h1>
            <p>
                The project is delivered via a userscript. That means that a script manager is required to run it.<br />
                Both <a href="">Tampermonkey</a> and <a href="">Violentmonkey</a> are supported, but the former is
                recommended.<br />
                Note that Greasemonkey is not officially supported, and is not guaranteed to work.
            </p>
            <a href="https://github.com/re621/re621/releases/latest/download/script.user.js" class="install-link">
                <img src="https://img.shields.io/github/v/release/re621/re621?label=Install&style=for-the-badge">
            </a>
            <p>
                Older versions of the script are available on the <a href="https://github.com/re621/re621.Legacy">Legacy
                    Page</a>.<br />
                It lacks some features, and will not receive updates besides critical bug fixes.
            </p>
        </section>

        <section>
            <h1>Updating</h1>
            <p>
                Note that re-installing the script by clicking the link in the Releases section will <b>wipe out your
                    current settings</b>
            </p>
            <p>
                Instead, manually update the script by clicking the <a href="./assets/help/update-1.jpg">tampermonkey
                    icon</a> in the
                toolbar, selecting <a href="./assets/help/update-2.jpg">Dashboard</a>,
                and then left-clicking on the <a href="./assets/help/update-3.jpg">last
                    update</a> column for the script. A new version will then be installed automatically.
            </p>
            <p>
                It is also recommended that you <a href="..assets/help/update-4.jpg">set
                    the update interval to daily</a> in the settings, so that you can receive all the latest changes and
                fixes as soon as they come out.
            </p>
        </section>

        <section>
            <h1>Features</h1>

            <feat>
                <img src="./assets/features/subscriptions.gif">
                <desc>
                    <h3>Subscriptions</h3>
                    <p>
                        Do you have a lot of pools that you want to keep a track of? Would you like to receive updates
                        on specific forum threads? Or do you just want to get notified of the new images of your
                        favorite artist / tag?
                    </p>
                    <p>
                        Well, if that's the case, then the Subscriptions Manager module is for you. Now, you can get
                        automatic notifications on all of these without having to keep track of specific pages.
                    </p>
                </desc>
            </feat>

            <feat>
                <img src="./assets/features/downloader.gif">
                <desc>
                    <h3>Mass Downloader</h3>
                    <p>
                        Do you like to download many posts at once from e621? If so, this module is for you. Select all
                        posts you want to download and a zip file will start to download. This also works for pools,
                        sets, and favorites.
                    </p>
                    <p>
                        The file names and structure of the downloaded zip is customizable in the scripts settings.
                    </p>
                </desc>
            </feat>

            <feat>
                <img src="./assets/features/search.gif">
                <desc>
                    <h3>Better Search</h3>
                    <p>
                        Tiny thumbnails and pagination are now a thing of the past. With this module, you can use
                        large, hi-res previews - and more posts are loaded automatically as you scroll. Browsing
                        experience has never been better on e621.
                    </p>
                    <p>
                        With HoverZoom functionality, as well as the voting and favorite buttons right on the thumbnail,
                        you may not need to open the individual post pages at all.
                    </p>
                </desc>
            </feat>

            <feat>
                <img src="./assets/features/header.gif">
                <desc>
                    <h3>Header Customizer</h3>
                    <p>
                        The links in the header are useful, but that's not what you might need every day. Now, you can
                        customize them to your heart's content.
                    </p>
                    <p>
                        You can quickly navigate to the first nine tabs with the number keys.
                    </p>
                </desc>
            </feat>

            <feat>
                <img src="./assets/features/smart-alias.png">
                <desc>
                    <h3>Smart Alias</h3>
                    <p>
                        Tagging on e621 is often a complicated affair. Some tags are not valid, some are aliased to
                        others, and some belong to artists on the <a
                            href="https://e621.net/wiki_pages/avoid_posting">avoid posting list</a>

                    </p>
                    <p>
                        Checking all of those has been time consuming... until now. SmartAlias automatically validates
                        your input, resolving aliases in the process. A smart suggestion engine provides tags that you
                        might want to add based on what you have already typed.
                    </p>
                    <p>
                        Moreover, this module includes a powerful custom aliasing system, allowing you to add several
                        pre-defined tags by typing in just one.
                    </p>
                </desc>
            </feat>

            <feat>
                <img src="./assets/features/post-ui.png">
                <desc>
                    <h3>Post Page UI Improvements</h3>
                    <p>
                        The post page has been altered and improved upon, bringing all the useful functions front and
                        center.
                    </p>
                    <p>
                        Post controls have been re-arranged and extended, allowing for easier voting and image group
                        manipulation. Meanwhile, image scaling has been tweaked to allow for better fitting options, as
                        well as on-the-fly option cycling.
                    </p>
                </desc>
            </feat>

            <feat>
                <desc>
                    <h3>... and a lot more!</h3>
                    <p>
                        The settings page features several options that are not big enough to warrant their own modules,
                        but are useful nonetheless.<br />
                        A few select features:
                    </p>
                    <ul>
                        <li>Keep the header and search form on screen when scrolling</li>
                        <li>Quickly add a tag to your blacklist by hovering over it and clicking on the x</li>
                        <li>Duplicates check when uploading, as well as fetching image size and file format</li>
                        <li>Custom flags, used to quickly detect posts with problematic tags from the search page</li>
                        <li>Hotkeys for just about anything on the site
                    </ul>
                </desc>
            </feat>

        </section>
    </content>
</body>

</html>