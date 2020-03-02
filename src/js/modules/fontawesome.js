//----------------------------------------------------
// FontAwesome
//----------------------------------------------------

import "@fortawesome/fontawesome-svg-core/styles.css"
import { config, library, dom } from "@fortawesome/fontawesome-svg-core"
import { faBars } from "@fortawesome/free-solid-svg-icons"
import { faTwitter } from "@fortawesome/free-brands-svg-icons"

config.showMissingIcons = false
config.autoAddCss = false
config.replacementClass = "icon"
library.add(faBars, faTwitter)
dom.i2svg()
