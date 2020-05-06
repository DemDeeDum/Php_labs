db.store.insertMany([
{name:"Intel Core i5-9400F", price: 5082, quantity: 4, vendor: "Intel", reviews:[{name:"John", text:"That's great!"},
 {name:"Nick", text:"Cheaper than expected."}], category: "Processor", status: "new", image:"https://i2.rozetka.ua/goods/12341342/91537256_images_12341342072.jpg"},
{name:"AMD Ryzen 5", price: 3615, quantity: 3, vendor: "AMD", category: "Processor", status: "used",
image:"https://i2.rozetka.ua/goods/4215083/amd_ryzen_5_2600_images_4215083224.jpg"},
{name:"GeForce GTX 1050 TI", price: 4675, quantity: 0, vendor: "NVIDIA", reviews:[{name:"Sally", text:"CS GO runs properly"},{ name:"Matew", text:"Not bad!!"}],
image:"https://i2.rozetka.ua/goods/1770937/msi_gtx_1050_ti_gaming_x_4g_images_1770937407.jpg"},
{name:"Nvidia Quadro RTX 5000", price: 73048, quantity: 2, vendor: "NVIDIA", reviews:[{name:"Adam", text:"This is a monster"}], category:"Graphics Card", staus: "new",
image:"https://i1.rozetka.ua/goods/15288539/hp_5jv89aa_images_15288539218.jpg"},
{name:"Asus Rog Strix G", price: 3359, quantity: 0, vendor: "Asus", category:"Motherboard",
image:"https://i2.rozetka.ua/goods/12123103/rog_strix_b365_g_gaming_images_12123103972.jpg"},
{name:"Gigabyte H310M", price: 1459, quantity: 10, category:"Motherboard", status: "new",
image:"https://i2.rozetka.ua/goods/12097139/gigabyte_h310m_s2v_2_0_images_12097139640.jpg"}
]);

db.vendors.insertMany ([
    {name:"AMD", image:"https://www.amd.com/system/files/amd-logo-circuit-background-1200x628.jpg", info: "Founded in 1969 as a Silicon Valley start-up, the AMD journey began with dozens of employees focused on leading-edge semiconductor products. From those modest beginnings, AMD has grown into a global company of 10,000 people, achieving many important industry firsts along the way. AMD today develops high-performance computing and visualization products to solve some of the world’s toughest and most interesting challenges. There has never been a better time to be in the semiconductor industry, and we are ready to tackle the next 50 years with high-performance computing and graphics solutions that transform all of our lives."},
    {name:'Intel', image: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Intel-logo.svg/1200px-Intel-logo.svg.png", 
    info : "For over 50 years, Intel and our people have made a profound impact on society. Now, we are on an exciting journey to transform from a PC and server company to a technology leader, trusted on performance and focused on unleashing the potential of data, creating value for people, business, and society on a global scale. Intel has always had a strong sense of culture and purpose. We know continuing to evolve our culture is a critical driver of our success and forward momentum."},
     {name : "NVIDIA", image: "https://i2.wp.com/itc.ua/wp-content/uploads/2019/04/Nvidia_logo.jpg?fit=770%2C546&quality=100&strip=all&ssl=1",
    info: "We set out 26 years ago to transform computer graphics.Fueled by the massive growth of the gaming market and its insatiable demand for better 3D graphics, we’ve evolved the GPU into a computer brain at the intersection of virtual reality, high performance computing, and artificial intelligence. NVIDIA GPU computing has become the essential tool of the da Vincis and Einsteins of our time. For them, we’ve built the equivalent of a time machine."},
    {name : 'Asus', image:'https://cdn.worldvectorlogo.com/logos/asus-6630.svg',
    info : "ASUS is passionate about technology and driven by innovation. We dream, we dare and we strive to create an effortless and joyful digital life for everyone. We're always in search of incredible ideas and experiences, and we aspire to deliver the incredible in everything we do. Established in 1989, ASUS is a multinational company known for the world’s best motherboards and high-quality personal computers, monitors, graphics cards, routers and other technology solutions. Today, ASUS is designing and building next-generation smart technologies to provide incredible experiences that enhance the lives of people everywhere."}
])