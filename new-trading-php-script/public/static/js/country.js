const CountryData = [
  { code: "us", name: "美国", enName: "United States", phoneAreaCode: "+1" },
  { code: "gb", name: "英国", enName: "United Kingdom", phoneAreaCode: "+44" },
  { code: "cn", name: "中国 (中国) ", enName: "China (中国)", phoneAreaCode: "+86" },
  {
    code: "af",
    name: "阿富汗 (افغانستان‎) ",
    enName: "Afghanistan (‫افغانستان‬‎)",
    phoneAreaCode: "+93",
  },
  {
    code: "al",
    name: "阿尔巴尼亚 (Shqipëri) ",
    enName: "Albania (Shqipëri)",
    phoneAreaCode: "+355",
  },
  {
    code: "dz",
    name: "阿尔及利亚 (الجزائر‎) ",
    enName: "Algeria (‫الجزائر‬‎)",
    phoneAreaCode: "+213",
  },
  { code: "as", name: "美属萨摩亚", enName: "American Samoa", phoneAreaCode: "+1684" },
  { code: "ad", name: "安道尔", enName: "Andorra", phoneAreaCode: "+376" },
  { code: "ao", name: "安哥拉", enName: "Angola", phoneAreaCode: "+244" },
  { code: "ai", name: "安圭拉", enName: "Anguilla", phoneAreaCode: "+1264" },
  {
    code: "ag",
    name: "安提瓜和巴布达",
    enName: "Antigua and Barbuda",
    phoneAreaCode: "+1268",
  },
  { code: "ar", name: "阿根廷", enName: "Argentina", phoneAreaCode: "+54" },
  {
    code: "am",
    name: "亚美尼亚 (Հայաստան) ",
    enName: "Armenia (Հայաստան)",
    phoneAreaCode: "+374",
  },
  { code: "aw", name: "阿鲁巴", enName: "Aruba", phoneAreaCode: "+297" },
  { code: "au", name: "澳大利亚", enName: "Australia", phoneAreaCode: "+61" },
  {
    code: "at",
    name: "奥地利 (Österreich) ",
    enName: "Austria (Österreich)",
    phoneAreaCode: "+43",
  },
  {
    code: "az",
    name: "阿塞拜疆 (Azərbaycan) ",
    enName: "Azerbaijan (Azərbaycan)",
    phoneAreaCode: "+994",
  },
  { code: "bs", name: "巴哈马", enName: "Bahamas", phoneAreaCode: "+1242" },
  {
    code: "bh",
    name: "巴林 (البحرين‎) ",
    enName: "Bahrain (‫البحرين‬‎)",
    phoneAreaCode: "+973",
  },
  {
    code: "bd",
    name: "孟加拉国 (বাংলাদেশ) ",
    enName: "Bangladesh (বাংলাদেশ)",
    phoneAreaCode: "+880",
  },
  { code: "bb", name: "巴巴多斯", enName: "Barbados", phoneAreaCode: "+1246" },
  {
    code: "by",
    name: "白俄罗斯 (Беларусь) ",
    enName: "Belarus (Беларусь)",
    phoneAreaCode: "+375",
  },
  {
    code: "be",
    name: "比利时 (België) ",
    enName: "Belgium (België)",
    phoneAreaCode: "+32",
  },
  { code: "bz", name: "伯利兹", enName: "Belize", phoneAreaCode: "+501" },
  { code: "bj", name: "贝宁 (Bénin) ", enName: "Benin (Bénin)", phoneAreaCode: "+229" },
  { code: "bm", name: "百慕大", enName: "Bermuda", phoneAreaCode: "+1441" },
  {
    code: "bt",
    name: "不丹 (འབྲུག) ",
    enName: "Bhutan (འབྲུག)",
    phoneAreaCode: "+975",
  },
  { code: "bo", name: "玻利维亚", enName: "Bolivia", phoneAreaCode: "+591" },
  {
    code: "ba",
    name: "波斯尼亚和黑塞哥维那 (Босна и Херцеговина) ",
    enName: "Bosnia and Herzegovina (Босна и Херцеговина)",
    phoneAreaCode: "+387",
  },
  { code: "bw", name: "博茨瓦纳", enName: "Botswana", phoneAreaCode: "+267" },
  { code: "br", name: "巴西（巴西）", enName: "Brazil (Brasil)", phoneAreaCode: "+55" },
  {
    code: "io",
    name: "英属印度洋领地",
    enName: "British Indian Ocean Territory",
    phoneAreaCode: "+246",
  },
  {
    code: "vg",
    name: "英属维尔京群岛",
    enName: "British Virgin Islands",
    phoneAreaCode: "+1284",
  },
  { code: "bn", name: "文莱", enName: "Brunei", phoneAreaCode: "+673" },
  {
    code: "bg",
    name: "保加利亚 (България) ",
    enName: "Bulgaria (България)",
    phoneAreaCode: "+359",
  },
  { code: "bf", name: "布基纳法索", enName: "Burkina Faso", phoneAreaCode: "+226" },
  {
    code: "bi",
    name: "布隆迪（乌布隆迪）",
    enName: "Burundi (Uburundi)",
    phoneAreaCode: "+257",
  },
  {
    code: "kh",
    name: "柬埔寨 (កម្ពុជា) ",
    enName: "Cambodia (កម្ពុជា)",
    phoneAreaCode: "+855",
  },
  {
    code: "cm",
    name: "喀麦隆（喀麦隆）",
    enName: "Cameroon (Cameroun)",
    phoneAreaCode: "+237",
  },
  { code: "ca", name: "加拿大", enName: "Canada", phoneAreaCode: "+1" },
  {
    code: "cv",
    name: "佛得角（卡布威尔第）",
    enName: "Cape Verde (Kabu Verdi)",
    phoneAreaCode: "+238",
  },
  {
    code: "bq",
    name: "加勒比海荷兰",
    enName: "Caribbean Netherlands",
    phoneAreaCode: "+599",
  },
  { code: "ky", name: "开曼群岛", enName: "Cayman Islands", phoneAreaCode: "+1345" },
  {
    code: "cf",
    name: "中非共和国 (République centrafricaine) ",
    enName: "Central African Republic (République centrafricaine)",
    phoneAreaCode: "+236",
  },
  { code: "td", name: "乍得（乍得）", enName: "Chad (Tchad)", phoneAreaCode: "+235" },
  { code: "cl", name: "智利", enName: "Chile", phoneAreaCode: "+56" },
  { code: "cx", name: "圣诞岛", enName: "Christmas Island", phoneAreaCode: "+61" },
  {
    code: "cc",
    name: "科科斯（基林）群岛",
    enName: "Cocos (Keeling) Islands",
    phoneAreaCode: "+61",
  },
  { code: "co", name: "哥伦比亚", enName: "Colombia", phoneAreaCode: "+57" },
  {
    code: "km",
    name: "科摩罗 (جزر القمر‎) ",
    enName: "Comoros (‫جزر القمر‬‎)",
    phoneAreaCode: "+269",
  },
  {
    code: "cd",
    name: "刚果 (DRC) (Jamhuri ya Kidemokrasia ya Kongo) ",
    enName: "Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)",
    phoneAreaCode: "+243",
  },
  {
    code: "cg",
    name: "刚果（共和国）（刚果-布拉柴维尔）",
    enName: "Congo (Republic) (Congo-Brazzaville)",
    phoneAreaCode: "+242",
  },
  { code: "ck", name: "库克群岛", enName: "Cook Islands", phoneAreaCode: "+682" },
  { code: "cr", name: "哥斯达黎加", enName: "Costa Rica", phoneAreaCode: "+506" },
  { code: "ci", name: "科特迪瓦", enName: "Côte d’Ivoire", phoneAreaCode: "+225" },
  {
    code: "hr",
    name: "克罗地亚 (Hrvatska) ",
    enName: "Croatia (Hrvatska)",
    phoneAreaCode: "+385",
  },
  { code: "cu", name: "古巴", enName: "Cuba", phoneAreaCode: "+53" },
  { code: "cw", name: "库拉索", enName: "Curaçao", phoneAreaCode: "+599" },
  {
    code: "cy",
    name: "塞浦路斯 (Κύπρος) ",
    enName: "Cyprus (Κύπρος)",
    phoneAreaCode: "+357",
  },
  {
    code: "cz",
    name: "捷克共和国 (Česká republika) ",
    enName: "Czech Republic (Česká republika)",
    phoneAreaCode: "+420",
  },
  {
    code: "dk",
    name: "丹麦（丹麦）",
    enName: "Denmark (Danmark)",
    phoneAreaCode: "+45",
  },
  { code: "dj", name: "吉布提", enName: "Djibouti", phoneAreaCode: "+253" },
  { code: "dm", name: "多米尼克", enName: "Dominica", phoneAreaCode: "+1767" },
  {
    code: "do",
    name: "多米尼加共和国 (República Dominicana) ",
    enName: "Dominican Republic (República Dominicana)",
    phoneAreaCode: "+1",
  },
  { code: "ec", name: "厄瓜多尔", enName: "Ecuador", phoneAreaCode: "+593" },
  { code: "eg", name: "埃及 (مصر‎) ", enName: "Egypt (‫مصر‬‎)", phoneAreaCode: "+20" },
  { code: "sv", name: "萨尔瓦多", enName: "El Salvador", phoneAreaCode: "+503" },
  {
    code: "gq",
    name: "赤道几内亚 (Guinea Ecuatorial) ",
    enName: "Equatorial Guinea (Guinea Ecuatorial)",
    phoneAreaCode: "+240",
  },
  { code: "er", name: "厄立特里亚", enName: "Eritrea", phoneAreaCode: "+291" },
  {
    code: "ee",
    name: "爱沙尼亚 (Eesti) ",
    enName: "Estonia (Eesti)",
    phoneAreaCode: "+372",
  },
  { code: "et", name: "埃塞俄比亚", enName: "Ethiopia", phoneAreaCode: "+251" },
  {
    code: "fk",
    name: "福克兰群岛（马尔维纳斯群岛）",
    enName: "Falkland Islands (Islas Malvinas)",
    phoneAreaCode: "+500",
  },
  {
    code: "fo",
    name: "法罗群岛 (Føroyar) ",
    enName: "Faroe Islands (Føroyar)",
    phoneAreaCode: "+298",
  },
  { code: "fj", name: "斐济", enName: "Fiji", phoneAreaCode: "+679" },
  {
    code: "fi",
    name: "芬兰 (Suomi) ",
    enName: "Finland (Suomi)",
    phoneAreaCode: "+358",
  },
  { code: "fr", name: "法国", enName: "France", phoneAreaCode: "+33" },
  {
    code: "gf",
    name: "法属圭亚那 (Guyane française) ",
    enName: "French Guiana (Guyane française)",
    phoneAreaCode: "+594",
  },
  {
    code: "pf",
    name: "法属波利尼西亚 (Polynésie française) ",
    enName: "French Polynesia (Polynésie française)",
    phoneAreaCode: "+689",
  },
  { code: "ga", name: "加蓬", enName: "Gabon", phoneAreaCode: "+241" },
  { code: "gm", name: "冈比亚", enName: "Gambia", phoneAreaCode: "+220" },
  {
    code: "ge",
    name: "格鲁吉亚 (საქართველო) ",
    enName: "Georgia (საქართველო)",
    phoneAreaCode: "+995",
  },
  {
    code: "de",
    name: "德国（德国）",
    enName: "Germany (Deutschland)",
    phoneAreaCode: "+49",
  },
  { code: "gh", name: "加纳 (Gaana) ", enName: "Ghana (Gaana)", phoneAreaCode: "+233" },
  { code: "gi", name: "直布罗陀", enName: "Gibraltar", phoneAreaCode: "+350" },
  {
    code: "gr",
    name: "希腊 (Ελλάδα) ",
    enName: "Greece (Ελλάδα)",
    phoneAreaCode: "+30",
  },
  {
    code: "gl",
    name: "格陵兰 (Kalaallit Nunaat) ",
    enName: "Greenland (Kalaallit Nunaat)",
    phoneAreaCode: "+299",
  },
  { code: "gd", name: "格林纳达", enName: "Grenada", phoneAreaCode: "+1473" },
  { code: "gp", name: "瓜德罗普岛", enName: "Guadeloupe", phoneAreaCode: "+590" },
  { code: "gu", name: "关岛", enName: "Guam", phoneAreaCode: "+1671" },
  { code: "gt", name: "危地马拉", enName: "Guatemala", phoneAreaCode: "+502" },
  { code: "gg", name: "根西岛", enName: "Guernsey", phoneAreaCode: "+44" },
  {
    code: "gn",
    name: "几内亚（几内亚）",
    enName: "Guinea (Guinée)",
    phoneAreaCode: "+224",
  },
  {
    code: "gw",
    name: "几内亚比绍 (Guiné Bissau) ",
    enName: "Guinea-Bissau (Guiné Bissau)",
    phoneAreaCode: "+245",
  },
  { code: "gy", name: "圭亚那", enName: "Guyana", phoneAreaCode: "+592" },
  { code: "ht", name: "海地", enName: "Haiti", phoneAreaCode: "+509" },
  { code: "hn", name: "洪都拉斯", enName: "Honduras", phoneAreaCode: "+504" },
  {
    code: "hk",
    name: "香港 (香港) ",
    enName: "Hong Kong (香港)",
    phoneAreaCode: "+852",
  },
  {
    code: "hu",
    name: "匈牙利 (Magyarország) ",
    enName: "Hungary (Magyarország)",
    phoneAreaCode: "+36",
  },
  {
    code: "is",
    name: "冰岛 (Ísland) ",
    enName: "Iceland (Ísland)",
    phoneAreaCode: "+354",
  },
  { code: "in", name: "印度 (भारत) ", enName: "India (भारत)", phoneAreaCode: "+91" },
  { code: "id", name: "印度尼西亚", enName: "Indonesia", phoneAreaCode: "+62" },
  {
    code: "ir",
    name: "伊朗 (ایران‎) ",
    enName: "Iran (‫ایران‬‎)",
    phoneAreaCode: "+98",
  },
  {
    code: "iq",
    name: "伊拉克 (العراق‎) ",
    enName: "Iraq (‫العراق‬‎)",
    phoneAreaCode: "+964",
  },
  { code: "ie", name: "爱尔兰", enName: "Ireland", phoneAreaCode: "+353" },
  { code: "im", name: "马恩岛", enName: "Isle of Man", phoneAreaCode: "+44" },
  {
    code: "il",
    name: "以色列 (ישראל‎) ",
    enName: "Israel (‫ישראל‬‎)",
    phoneAreaCode: "+972",
  },
  {
    code: "it",
    name: "意大利（意大利）",
    enName: "Italy (Italia)",
    phoneAreaCode: "+39",
  },
  { code: "jm", name: "牙买加", enName: "Jamaica", phoneAreaCode: "+1876" },
  { code: "jp", name: "日本（日本）", enName: "Japan (日本)", phoneAreaCode: "+81" },
  { code: "je", name: "泽西", enName: "Jersey", phoneAreaCode: "+44" },
  {
    code: "jo",
    name: "约旦 (الأردن‎) ",
    enName: "Jordan (‫الأردن‬‎)",
    phoneAreaCode: "+962",
  },
  {
    code: "kz",
    name: "哈萨克斯坦 (Казахстан) ",
    enName: "Kazakhstan (Казахстан)",
    phoneAreaCode: "+7",
  },
  { code: "ke", name: "肯尼亚", enName: "Kenya", phoneAreaCode: "+254" },
  { code: "ki", name: "基里巴斯", enName: "Kiribati", phoneAreaCode: "+686" },
  { code: "xk", name: "科索沃", enName: "Kosovo", phoneAreaCode: "+383" },
  {
    code: "kw",
    name: "科威特 (الكويت‎) ",
    enName: "Kuwait (‫الكويت‬‎)",
    phoneAreaCode: "+965",
  },
  {
    code: "kg",
    name: "吉尔吉斯斯坦 (Кыргызстан) ",
    enName: "Kyrgyzstan (Кыргызстан)",
    phoneAreaCode: "+996",
  },
  { code: "la", name: "老挝 (ລາວ) ", enName: "Laos (ລາວ)", phoneAreaCode: "+856" },
  {
    code: "lv",
    name: "拉脱维亚 (Latvija) ",
    enName: "Latvia (Latvija)",
    phoneAreaCode: "+371",
  },
  {
    code: "lb",
    name: "黎巴嫩 (لبنان‎) ",
    enName: "Lebanon (‫لبنان‬‎)",
    phoneAreaCode: "+961",
  },
  { code: "ls", name: "莱索托", enName: "Lesotho", phoneAreaCode: "+266" },
  { code: "lr", name: "利比里亚", enName: "Liberia", phoneAreaCode: "+231" },
  {
    code: "ly",
    name: "利比亚 (ليبيا‎) ",
    enName: "Libya (‫ليبيا‬‎)",
    phoneAreaCode: "+218",
  },
  { code: "li", name: "列支敦士登", enName: "Liechtenstein", phoneAreaCode: "+423" },
  {
    code: "lt",
    name: "立陶宛 (Lietuva) ",
    enName: "Lithuania (Lietuva)",
    phoneAreaCode: "+370",
  },
  { code: "lu", name: "卢森堡", enName: "Luxembourg", phoneAreaCode: "+352" },
  { code: "mo", name: "澳门 (澳门) ", enName: "Macau (澳門)", phoneAreaCode: "+853" },
  {
    code: "mk",
    name: "马其顿 (FYROM) (Македонија) ",
    enName: "Macedonia (FYROM) (Македонија)",
    phoneAreaCode: "+389",
  },
  {
    code: "mg",
    name: "马达加斯加 (Madagasikara) ",
    enName: "Madagascar (Madagasikara)",
    phoneAreaCode: "+261",
  },
  { code: "mw", name: "马拉维", enName: "Malawi", phoneAreaCode: "+265" },
  { code: "my", name: "马来西亚", enName: "Malaysia", phoneAreaCode: "+60" },
  { code: "mv", name: "马尔代夫", enName: "Maldives", phoneAreaCode: "+960" },
  { code: "ml", name: "马里", enName: "Mali", phoneAreaCode: "+223" },
  { code: "mt", name: "马耳他", enName: "Malta", phoneAreaCode: "+356" },
  { code: "mh", name: "马绍尔群岛", enName: "Marshall Islands", phoneAreaCode: "+692" },
  { code: "mq", name: "马提尼克", enName: "Martinique", phoneAreaCode: "+596" },
  {
    code: "mr",
    name: "毛里塔尼亚 (موريتانيا‎) ",
    enName: "Mauritania (‫موريتانيا‬‎)",
    phoneAreaCode: "+222",
  },
  {
    code: "mu",
    name: "毛里求斯（莫里斯）",
    enName: "Mauritius (Moris)",
    phoneAreaCode: "+230",
  },
  { code: "yt", name: "马约特岛", enName: "Mayotte", phoneAreaCode: "+262" },
  {
    code: "mx",
    name: "墨西哥（墨西哥）",
    enName: "Mexico (México)",
    phoneAreaCode: "+52",
  },
  { code: "fm", name: "密克罗尼西亚", enName: "Micronesia", phoneAreaCode: "+691" },
  {
    code: "md",
    name: "摩尔多瓦（摩尔多瓦共和国）",
    enName: "Moldova (Republica Moldova)",
    phoneAreaCode: "+373",
  },
  { code: "mc", name: "摩纳哥", enName: "Monaco", phoneAreaCode: "+377" },
  {
    code: "mn",
    name: "蒙古 (Монгол) ",
    enName: "Mongolia (Монгол)",
    phoneAreaCode: "+976",
  },
  {
    code: "me",
    name: "黑山 (Crna Gora) ",
    enName: "Montenegro (Crna Gora)",
    phoneAreaCode: "+382",
  },
  { code: "ms", name: "蒙特塞拉特", enName: "Montserrat", phoneAreaCode: "+1664" },
  {
    code: "ma",
    name: "摩洛哥 (المغرب‎) ",
    enName: "Morocco (‫المغرب‬‎)",
    phoneAreaCode: "+212",
  },
  {
    code: "mz",
    name: "莫桑比克（莫桑比克）",
    enName: "Mozambique (Moçambique)",
    phoneAreaCode: "+258",
  },
  {
    code: "mm",
    name: "缅甸（缅甸）（မြန်မာ）",
    enName: "Myanmar (Burma) (မြန်မာ)",
    phoneAreaCode: "+95",
  },
  {
    code: "na",
    name: "纳米比亚 (Namibië) ",
    enName: "Namibia (Namibië)",
    phoneAreaCode: "+264",
  },
  { code: "nr", name: "瑙鲁", enName: "Nauru", phoneAreaCode: "+674" },
  {
    code: "np",
    name: "尼泊尔 (नेपाल) ",
    enName: "Nepal (नेपाल)",
    phoneAreaCode: "+977",
  },
  {
    code: "nl",
    name: "荷兰（荷兰）",
    enName: "Netherlands (Nederland)",
    phoneAreaCode: "+31",
  },
  {
    code: "nc",
    name: "新喀里多尼亚 (Nouvelle-Calédonie) ",
    enName: "New Caledonia (Nouvelle-Calédonie)",
    phoneAreaCode: "+687",
  },
  { code: "nz", name: "新西兰", enName: "New Zealand", phoneAreaCode: "+64" },
  { code: "ni", name: "尼加拉瓜", enName: "Nicaragua", phoneAreaCode: "+505" },
  {
    code: "ne",
    name: "尼日尔 (Nijar) ",
    enName: "Niger (Nijar)",
    phoneAreaCode: "+227",
  },
  { code: "ng", name: "尼日利亚", enName: "Nigeria", phoneAreaCode: "+234" },
  { code: "nu", name: "纽埃", enName: "Niue", phoneAreaCode: "+683" },
  { code: "nf", name: "诺福克岛", enName: "Norfolk Island", phoneAreaCode: "+672" },
  {
    code: "kp",
    name: "朝鲜 (조선 민주주의 인민 공화국) ",
    enName: "North Korea (조선 민주주의 인민 공화국)",
    phoneAreaCode: "+850",
  },
  {
    code: "mp",
    name: "北马里亚纳群岛",
    enName: "Northern Mariana Islands",
    phoneAreaCode: "+1670",
  },
  { code: "no", name: "挪威 (Norge) ", enName: "Norway (Norge)", phoneAreaCode: "+47" },
  {
    code: "om",
    name: "阿曼 (عُمان‎) ",
    enName: "Oman (‫عُمان‬‎)",
    phoneAreaCode: "+968",
  },
  {
    code: "pk",
    name: "巴基斯坦 (پاکستان‎) ",
    enName: "Pakistan (‫پاکستان‬‎)",
    phoneAreaCode: "+92",
  },
  { code: "pw", name: "帕劳", enName: "Palau", phoneAreaCode: "+680" },
  {
    code: "ps",
    name: "巴勒斯坦 (فلسطين‎) ",
    enName: "Palestine (‫فلسطين‬‎)",
    phoneAreaCode: "+970",
  },
  {
    code: "pa",
    name: "巴拿马 (Panamá) ",
    enName: "Panama (Panamá)",
    phoneAreaCode: "+507",
  },
  {
    code: "pg",
    name: "巴布亚新几内亚",
    enName: "Papua New Guinea",
    phoneAreaCode: "+675",
  },
  { code: "py", name: "巴拉圭", enName: "Paraguay", phoneAreaCode: "+595" },
  { code: "pe", name: "秘鲁（秘鲁）", enName: "Peru (Perú)", phoneAreaCode: "+51" },
  { code: "ph", name: "菲律宾", enName: "Philippines", phoneAreaCode: "+63" },
  {
    code: "pl",
    name: "波兰（Polska）",
    enName: "Poland (Polska)",
    phoneAreaCode: "+48",
  },
  { code: "pt", name: "葡萄牙", enName: "Portugal", phoneAreaCode: "+351" },
  { code: "pr", name: "波多黎各", enName: "Puerto Rico", phoneAreaCode: "+1" },
  {
    code: "qa",
    name: "卡塔尔 (قطر) ",
    enName: "Qatar (‫قطر‬‎)",
    phoneAreaCode: "+974",
  },
  {
    code: "re",
    name: "留尼汪 (La Réunion) ",
    enName: "Réunion (La Réunion)",
    phoneAreaCode: "+262",
  },
  {
    code: "ro",
    name: "罗马尼亚 (România) ",
    enName: "Romania (România)",
    phoneAreaCode: "+40",
  },
  {
    code: "ru",
    name: "俄罗斯 (Россия) ",
    enName: "Russia (Россия)",
    phoneAreaCode: "+7",
  },
  { code: "rw", name: "卢旺达", enName: "Rwanda", phoneAreaCode: "+250" },
  {
    code: "bl",
    name: "圣巴泰勒米 (Saint-Barthélemy) ",
    enName: "Saint Barthélemy (Saint-Barthélemy)",
    phoneAreaCode: "+590",
  },
  { code: "sh", name: "圣赫勒拿", enName: "Saint Helena", phoneAreaCode: "+290" },
  {
    code: "kn",
    name: "圣基茨和尼维斯",
    enName: "Saint Kitts and Nevis",
    phoneAreaCode: "+1869",
  },
  { code: "lc", name: "圣卢西亚", enName: "Saint Lucia", phoneAreaCode: "+1758" },
  {
    code: "mf",
    name: "圣马丁 (Saint-Martin (partie française)) ",
    enName: "Saint Martin (Saint-Martin (partie française))",
    phoneAreaCode: "+590",
  },
  {
    code: "pm",
    name: "圣皮埃尔和密克隆 (Saint-Pierre-et-Miquelon) ",
    enName: "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)",
    phoneAreaCode: "+508",
  },
  {
    code: "vc",
    name: "圣文森特和格林纳丁斯",
    enName: "Saint Vincent and the Grenadines",
    phoneAreaCode: "+1784",
  },
  { code: "ws", name: "萨摩亚", enName: "Samoa", phoneAreaCode: "+685" },
  { code: "sm", name: "圣马力诺", enName: "San Marino", phoneAreaCode: "+378" },
  {
    code: "st",
    name: "圣多美和普林西比 (São Tomé e Príncipe) ",
    enName: "São Tomé and Príncipe (São Tomé e Príncipe)",
    phoneAreaCode: "+239",
  },
  {
    code: "sa",
    name: "沙特阿拉伯 (المملكة العربية السعودية‎) ",
    enName: "Saudi Arabia (‫المملكة العربية السعودية‬‎)",
    phoneAreaCode: "+966",
  },
  {
    code: "sn",
    name: "塞内加尔 (Sénégal) ",
    enName: "Senegal (Sénégal)",
    phoneAreaCode: "+221",
  },
  {
    code: "rs",
    name: "塞尔维亚 (Србија) ",
    enName: "Serbia (Србија)",
    phoneAreaCode: "+381",
  },
  { code: "sc", name: "塞舌尔", enName: "Seychelles", phoneAreaCode: "+248" },
  { code: "sl", name: "塞拉利昂", enName: "Sierra Leone", phoneAreaCode: "+232" },
  { code: "sg", name: "新加坡", enName: "Singapore", phoneAreaCode: "+65" },
  { code: "sx", name: "圣马丁", enName: "Sint Maarten", phoneAreaCode: "+1721" },
  {
    code: "sk",
    name: "斯洛伐克 (Slovensko) ",
    enName: "Slovakia (Slovensko)",
    phoneAreaCode: "+421",
  },
  {
    code: "si",
    name: "斯洛文尼亚 (Slovenija) ",
    enName: "Slovenia (Slovenija)",
    phoneAreaCode: "+386",
  },
  { code: "sb", name: "所罗门群岛", enName: "Solomon Islands", phoneAreaCode: "+677" },
  {
    code: "so",
    name: "索马里（Soomaaliya）",
    enName: "Somalia (Soomaaliya)",
    phoneAreaCode: "+252",
  },
  { code: "za", name: "南非", enName: "South Africa", phoneAreaCode: "+27" },
  {
    code: "kr",
    name: "韩国 (대한민국) ",
    enName: "South Korea (대한민국)",
    phoneAreaCode: "+82",
  },
  {
    code: "ss",
    name: "南苏丹 (جنوب السودان‎) ",
    enName: "South Sudan (‫جنوب السودان‬‎)",
    phoneAreaCode: "+211",
  },
  {
    code: "es",
    name: "西班牙（西班牙）",
    enName: "Spain (España)",
    phoneAreaCode: "+34",
  },
  {
    code: "lk",
    name: "斯里兰卡 (ශ්‍රී ලංකාව) ",
    enName: "Sri Lanka (ශ්‍රී ලංකාව)",
    phoneAreaCode: "+94",
  },
  {
    code: "sd",
    name: "苏丹 (السودان‎) ",
    enName: "Sudan (‫السودان‬‎)",
    phoneAreaCode: "+249",
  },
  { code: "sr", name: "苏里南", enName: "Suriname", phoneAreaCode: "+597" },
  {
    code: "sj",
    name: "斯瓦尔巴和扬马延",
    enName: "Svalbard and Jan Mayen",
    phoneAreaCode: "+47",
  },
  { code: "sz", name: "斯威士兰", enName: "Swaziland", phoneAreaCode: "+268" },
  {
    code: "se",
    name: "瑞典（Sverige）",
    enName: "Sweden (Sverige)",
    phoneAreaCode: "+46",
  },
  {
    code: "ch",
    name: "瑞士（瑞士）",
    enName: "Switzerland (Schweiz)",
    phoneAreaCode: "+41",
  },
  {
    code: "sy",
    name: "叙利亚 (سوريا‎) ",
    enName: "Syria (‫سوريا‬‎)",
    phoneAreaCode: "+963",
  },
  { code: "tw", name: "台湾 (台湾) ", enName: "Taiwan (台灣)", phoneAreaCode: "+886" },
  { code: "tj", name: "塔吉克斯坦", enName: "Tajikistan", phoneAreaCode: "+992" },
  { code: "tz", name: "坦桑尼亚", enName: "Tanzania", phoneAreaCode: "+255" },
  { code: "th", name: "泰国 (ไทย) ", enName: "Thailand (ไทย)", phoneAreaCode: "+66" },
  { code: "tl", name: "东帝汶", enName: "Timor-Leste", phoneAreaCode: "+670" },
  { code: "tg", name: "多哥", enName: "Togo", phoneAreaCode: "+228" },
  { code: "tk", name: "托克劳", enName: "Tokelau", phoneAreaCode: "+690" },
  { code: "to", name: "汤加", enName: "Tonga", phoneAreaCode: "+676" },
  {
    code: "tt",
    name: "特立尼达和多巴哥",
    enName: "Trinidad and Tobago",
    phoneAreaCode: "+1868",
  },
  {
    code: "tn",
    name: "突尼斯 (تونس‎) ",
    enName: "Tunisia (‫تونس‬‎)",
    phoneAreaCode: "+216",
  },
  {
    code: "tr",
    name: "土耳其 (Türkiye) ",
    enName: "Turkey (Türkiye)",
    phoneAreaCode: "+90",
  },
  { code: "tm", name: "土库曼斯坦", enName: "Turkmenistan", phoneAreaCode: "+993" },
  {
    code: "tc",
    name: "特克斯和凯科斯群岛",
    enName: "Turks and Caicos Islands",
    phoneAreaCode: "+1649",
  },
  { code: "tv", name: "图瓦卢", enName: "Tuvalu", phoneAreaCode: "+688" },
  {
    code: "vi",
    name: "美属维尔京群岛",
    enName: "U.S. Virgin Islands",
    phoneAreaCode: "+1340",
  },
  { code: "ug", name: "乌干达", enName: "Uganda", phoneAreaCode: "+256" },
  {
    code: "ua",
    name: "乌克兰 (Україна) ",
    enName: "Ukraine (Україна)",
    phoneAreaCode: "+380",
  },
  {
    code: "ae",
    name: "阿拉伯联合酋长国 (الإمارات العربية المتحدة‎) ",
    enName: "United Arab Emirates (‫الإمارات العربية المتحدة‬‎)",
    phoneAreaCode: "+971",
  },
  { code: "uy", name: "乌拉圭", enName: "Uruguay", phoneAreaCode: "+598" },
  {
    code: "uz",
    name: "乌兹别克斯坦 (Oʻzbekiston) ",
    enName: "Uzbekistan (Oʻzbekiston)",
    phoneAreaCode: "+998",
  },
  { code: "vu", name: "瓦努阿图", enName: "Vanuatu", phoneAreaCode: "+678" },
  {
    code: "va",
    name: "梵蒂冈城 (Città del Vaticano) ",
    enName: "Vatican City (Città del Vaticano)",
    phoneAreaCode: "+39",
  },
  { code: "ve", name: "委内瑞拉", enName: "Venezuela", phoneAreaCode: "+58" },
  {
    code: "vn",
    name: "越南 (Việt Nam) ",
    enName: "Vietnam (Việt Nam)",
    phoneAreaCode: "+84",
  },
  {
    code: "wf",
    name: "瓦利斯和富图纳",
    enName: "Wallis and Futuna",
    phoneAreaCode: "+681",
  },
  /*{
    code: "eh",
    name: "西撒哈拉 (الصحراء الغربية‎) ",
    enName: "Western Sahara (‫الصحراء الغربية‬‎)",
    phoneAreaCode: "+212",
  },*/
  {
    code: "ye",
    name: "也门 (اليمن‎) ",
    enName: "Yemen (‫اليمن‬‎)",
    phoneAreaCode: "+967",
  },
  { code: "zm", name: "赞比亚", enName: "Zambia", phoneAreaCode: "+260" },
  { code: "zw", name: "津巴布韦", enName: "Zimbabwe", phoneAreaCode: "+263" },
  { code: "ax", name: "奥兰群岛", enName: "Åland Islands", phoneAreaCode: "+358" },
];


