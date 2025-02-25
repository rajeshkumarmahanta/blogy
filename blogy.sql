-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 10:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_1` text NOT NULL,
  `about_2` text NOT NULL,
  `about_1desc` text NOT NULL,
  `about_2desc` text NOT NULL,
  `about_1image` varchar(1000) NOT NULL,
  `about_2image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_1`, `about_2`, `about_1desc`, `about_2desc`, `about_1image`, `about_2image`) VALUES
(1, 'Resources for makers and creatives', 'Resources for makers and creatives', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\n\r\n', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.', 'hero_1.jpg', 'hero_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '9876543210', '$2y$10$4M.jOBgN7AMLFYoEshQmrO4XNZpdgLPEUguV4VKTjIrks0tQL1uWW');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_tbl`
--

CREATE TABLE `blogs_tbl` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `userMail` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `image` varchar(1000) NOT NULL,
  `category` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `viewCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs_tbl`
--

INSERT INTO `blogs_tbl` (`id`, `title`, `description`, `userMail`, `tags`, `image`, `category`, `createdAt`, `viewCount`) VALUES
(1, 'How AI is Reshaping Front-End Web Development in 2025', 'AI is transforming front-end web development by automating repetitive tasks, enhancing user experiences, and driving innovation. Tools like GitHub Copilot and ChatGPT streamline coding, debugging, and testing, allowing developers to focus on complex problem-solving and creativity. AI-powered solutions also enable real-time personalization, predictive resource loading, and improved accessibility, making web experiences more tailored and inclusive. Design-to-code platforms are bridging the gap between design and development, while chatbots and conversational interfaces are redefining user interaction. However, challenges like over-reliance on AI, biases in models, and security vulnerabilities highlight the need for ethical and thoughtful adoption. As AI evolves, it promises to empower developers, blending human ingenuity with machine intelligence to shape the future of the web.', 'rajesh@gmail.com', 'ai,artificial intelligence', 'webdeveloper.jpeg', 'Culture & Heritage', '2025-01-06 17:29:21', 1),
(2, 'The State of Front-End Web Development in 2025', 'Front-end web development in 2025 is at an exciting crossroads, marked by rapid advancements and new challenges. AI-powered tools like GitHub Copilot and ChatGPT are revolutionizing workflows, making coding faster and smarter, while frameworks such as React, Svelte, and SolidJS continue to evolve, pushing boundaries in performance and usability. Developers are prioritizing performance optimization, accessibility, and progressive web apps to create seamless, inclusive, and cross-platform experiences. Tools like Vite and Turbopack are streamlining builds, and TypeScript has cemented itself as an essential skill. However, the ever-expanding ecosystem of tools and frameworks has led to decision fatigue, alongside growing concerns about security vulnerabilities in open-source software. As we look to the future, staying adaptable, embracing innovation, and maintaining a user-first mindset will be crucial for developers navigating this dynamic and fast-paced industry.', 'rajesh@gmail.com', 'web developement,website', '677bc864218782.57284088.jpeg', 'web developement', '2025-01-06 17:41:16', 3),
(5, 'How AI is Revolutionizing Web Development: Tools, Trends, and Future Possibilities', '<p>Artificial Intelligence (AI) is transforming industries, and web development is no exception. From automating mundane tasks to enhancing user experience with personalization, AI is empowering developers and changing how websites and applications are built. In this blog, we&rsquo;ll explore the role of AI in web development, current tools, and what the future holds.</p>\r\n<p><strong>Main Sections:</strong></p>\r\n<h3>1. <strong>AI in Design and Development: A Game Changer</strong></h3>\r\n<ul>\r\n    <li>Discuss how AI is automating repetitive tasks like layout creation, testing, and debugging.</li>\r\n    <li>Example: Tools like <em>Figma&rsquo;s AI assistants</em> or <em>ChatGPT</em> for generating code snippets.</li>\r\n    <li>Highlight AI\'s role in speeding up wireframing and prototyping.</li>\r\n</ul>\r\n<h3>2. <strong>Code Assistants: Making Developers&rsquo; Lives Easier</strong></h3>\r\n<ul>\r\n    <li>Explore tools like GitHub Copilot, Tabnine, and Kite.</li>\r\n    <li>Discuss how AI can suggest, autocomplete, and debug code in real-time.</li>\r\n    <li>Mention how AI can reduce time spent on mundane coding tasks, enabling developers to focus on creative problem-solving.</li>\r\n</ul>\r\n<h3>3. <strong>AI for Personalized User Experiences</strong></h3>\r\n<ul>\r\n    <li>Explain how AI-driven personalization creates tailored user journeys.</li>\r\n    <li>Examples: Recommender systems like Netflix or Spotify and chatbots powered by NLP (Natural Language Processing).</li>\r\n    <li>Tools: TensorFlow.js, Microsoft Bot Framework, and Dialogflow.</li>\r\n</ul>\r\n<h3>4. <strong>AI in SEO and Content Creation</strong></h3>\r\n<ul>\r\n    <li>Discuss how AI tools like Jasper and SurferSEO can help developers and content creators optimize for search engines.</li>\r\n    <li>Highlight AI\'s role in analyzing user data and suggesting keyword strategies.</li>\r\n    <li>Tools for automated content generation and optimization.</li>\r\n</ul>\r\n<h3>5. <strong>AI-Driven Testing and Debugging</strong></h3>\r\n<ul>\r\n    <li>How AI tools like Testim.io and Selenium leverage machine learning to identify bugs faster.</li>\r\n    <li>Discuss the use of AI in predictive testing and regression analysis.</li>\r\n    <li>Highlight benefits: fewer errors, quicker launches, and better overall quality.</li>\r\n</ul>\r\n<h3>6. <strong>Natural Language Interfaces for Websites</strong></h3>\r\n<ul>\r\n    <li>Introduce the concept of voice and chat interfaces powered by AI.</li>\r\n    <li>Examples: Voice search on websites and AI-powered customer support chatbots.</li>\r\n    <li>Frameworks: Rasa, Amazon Lex, and Wit.ai.</li>\r\n</ul>\r\n<h3>7. <strong>AI in Accessibility</strong></h3>\r\n<ul>\r\n    <li>Discuss how AI is improving web accessibility for users with disabilities.</li>\r\n    <li>Examples: AI-powered screen readers, automatic alt-text generation, and color contrast adjustment tools.</li>\r\n    <li>Tools: Microsoft Azure AI for Accessibility and Google&rsquo;s Lookout.</li>\r\n</ul>\r\n<h3>8. <strong>AI in Predictive Analysis and Decision Making</strong></h3>\r\n<ul>\r\n    <li>How AI helps analyze user data for actionable insights.</li>\r\n    <li>Examples: Predicting user behavior and optimizing UX/UI based on analytics.</li>\r\n    <li>Tools: Google Analytics 4 with AI-driven insights.</li>\r\n</ul>\r\n<h3>9. <strong>Ethical Considerations in AI-Powered Development</strong></h3>\r\n<ul>\r\n    <li>Discuss the challenges of bias in AI models and ensuring data privacy.</li>\r\n    <li>The importance of creating ethical AI solutions in web development.</li>\r\n    <li>Suggestions for mitigating risks through transparency and responsible AI use.</li>\r\n</ul>\r\n<h3>10. <strong>The Future of AI in Web Development</strong></h3>\r\n<ul>\r\n    <li>Speculate on how AI might influence web development in the next decade.</li>\r\n    <li>Examples: Fully autonomous website builders, hyper-personalization, and AI-driven cybersecurity.</li>\r\n    <li>Encourage developers to adapt and integrate AI into their workflows.</li>\r\n</ul>', 'kaushik@gmail.com', 'dev developement,artificial intelligence,ai', '677d1eac033911.59427972.jpeg', 'Artificial intelligence', '2025-01-07 13:28:31', 1),
(6, 'How Social Media Integration is Transforming Modern Websites', '<p>&nbsp;Social media has become an essential part of the online ecosystem. Integrating social platforms into websites not only boosts user engagement but also enhances marketing efforts and brand visibility. In this blog, we&rsquo;ll explore the best practices, tools, and benefits of incorporating social media into modern web development.</p>\r\n<p><strong>Main Sections:</strong></p>\r\n<h3>1. <strong>The Importance of Social Media in Web Development</strong></h3>\r\n<ul>\r\n    <li>Discuss how social media integration impacts website traffic, user engagement, and brand identity.</li>\r\n    <li>Provide statistics: e.g., websites with social sharing buttons have 150% more engagement.</li>\r\n</ul>\r\n<h3>2. <strong>Best Practices for Social Media Integration</strong></h3>\r\n<ul>\r\n    <li><strong>Social Sharing Buttons:</strong> Explain how adding share buttons for Facebook, Twitter, LinkedIn, and Pinterest can amplify content reach.</li>\r\n    <li><strong>Follow Buttons and Feeds:</strong> Embed follow buttons or live social media feeds to keep users updated.</li>\r\n    <li><strong>Social Login:</strong> Discuss the benefits of allowing users to sign up/login via social accounts like Google, Facebook, or Twitter.</li>\r\n</ul>\r\n<h3>3. <strong>Top Tools and APIs for Social Media Integration</strong></h3>\r\n<ul>\r\n    <li><strong>APIs for Developers:</strong>\r\n    <ul>\r\n        <li>Facebook Graph API for embedding posts or fetching data.</li>\r\n        <li>Twitter API for tweets and timelines.</li>\r\n        <li>Instagram Basic Display API for showcasing photo feeds.</li>\r\n    </ul>\r\n    </li>\r\n    <li><strong>Plugins for Easy Integration:</strong>\r\n    <ul>\r\n        <li>WordPress plugins like Jetpack or AddThis for social sharing.</li>\r\n        <li>Third-party tools like ShareThis and Buffer for managing social engagement.</li>\r\n    </ul>\r\n    </li>\r\n</ul>\r\n<h3>4. <strong>Enhancing Engagement Through Social Proof</strong></h3>\r\n<ul>\r\n    <li>Explain how displaying likes, shares, and comments builds credibility.</li>\r\n    <li>Showcase examples of websites that highlight social proof effectively.</li>\r\n    <li>Discuss tools like Fomo for live social proof notifications.</li>\r\n</ul>\r\n<h3>5. <strong>Social Media Content Automation</strong></h3>\r\n<ul>\r\n    <li>Explore how automation tools like Zapier, Buffer, and Hootsuite can save time.</li>\r\n    <li>Discuss scheduling social posts directly from a website CMS.</li>\r\n    <li>Example: Automating blog post shares across platforms when published.</li>\r\n</ul>\r\n<h3>6. <strong>User-Generated Content (UGC): The Power of Authenticity</strong></h3>\r\n<ul>\r\n    <li>Highlight the value of UGC like reviews, testimonials, and hashtags.</li>\r\n    <li>Discuss embedding UGC directly onto websites, e.g., pulling Instagram posts tagged with a brand hashtag.</li>\r\n    <li>Tools: Taggbox, TINT, or Walls.io for UGC feeds.</li>\r\n</ul>\r\n<h3>7. <strong>Social Media Analytics Integration</strong></h3>\r\n<ul>\r\n    <li>Explain how integrating analytics tools like Facebook Pixel, Twitter Analytics, and Google Analytics helps track performance.</li>\r\n    <li>Highlight how this data can inform web development decisions.</li>\r\n</ul>\r\n<h3>8. <strong>Social Media Widgets and Embeds</strong></h3>\r\n<ul>\r\n    <li>Share examples of embedding YouTube videos, TikTok clips, and Twitter threads.</li>\r\n    <li>Discuss how these enhance content interactivity and dwell time.</li>\r\n</ul>\r\n<h3>9. <strong>Challenges of Social Media Integration</strong></h3>\r\n<ul>\r\n    <li><strong>Performance Concerns:</strong> Discuss how embedded widgets or heavy APIs can slow down websites.</li>\r\n    <li><strong>Data Privacy:</strong> Highlight the importance of GDPR/CCPA compliance when using social logins or trackers.</li>\r\n    <li><strong>Consistency Across Platforms:</strong> Ensure consistent branding between a website and its social media presence.</li>\r\n</ul>\r\n<h3>10. <strong>The Future of Social Media in Web Development</strong></h3>\r\n<ul>\r\n    <li>Predict trends like deeper AR/VR social integrations, live shopping through embedded streams, and AI-driven personalization.</li>\r\n    <li>Encourage developers to think creatively about how social media can shape web experiences.</li>\r\n</ul>', 'kaushik@gmail.com', 'social,social media', '677d1f703b0835.08313066.jpeg', 'social media', '2025-01-07 18:04:56', 0),
(7, 'Badaghagra waterfall', 'Badaghagra waterfall adjacent to Keonjhar town is a most spectacular waterfall situated amidst in a lush green forest environment. The waterfall enjoys a unique characteristics of 100 feet height inside the dense forest area to the much delight of tourists, picnicors & weekend holidayer alike. Badaghagra reservoir which was raised on Machakandana river during the Kingdom era is the major source of water supplies to the Keonjhar town. The spot is rich in exotic flora & fauna and rare place for study of tribal life. This spot is just 10 km away from Keonjhar town.', 'rajesh@gmail.com', 'nature,badaghagara', '6780bb0411cea6.29050299.jpg', 'nature', '2025-01-10 11:45:32', 0),
(8, 'Maa tarini temple, ghatagoan', 'Ghatagaon Maa Tarini Pitha is a place of famous pilgrimage centre of Odisha. Maa Tarini Temple is raised in modern time, the crude form of deity justify its pristine origin. The legend is that Maa Tarini is merciful and benevolent to her devotees. Nearest forest reserves adding beauty to the Maa Tarini Pitha is the nestling site of different wildlifes. Devotees are very fondly offers coconut to Goddess is still worshiped by tribal priests. Local people observes Maha Bisuba Sankranti during the month of Chaitra Purnima with great forever & pomp. Visitors within the state & outside of the state throng here in lakhs to pay their respect to Mother Goddess all around the year. Maa Tarini Pitha is just 45 km away from Keonjhar town.', 'rajesh@gmail.com', 'devotional,maa tarini', '6780bc5a9cdcf7.63907224.jpg', 'Culture & Heritage', '2025-01-10 11:51:14', 0),
(9, 'The Taj Mahal: A Timeless Monument of Love', 'Visiting the Taj Mahal was an experience that left me in awe of its unparalleled beauty and grandeur. As I approached the iconic monument, the first glimpse of its shimmering white marble façade took my breath away. The sheer scale of the structure and the precision of its symmetrical design were even more impressive in person. Walking through the main gate, the perfectly aligned view of the Taj Mahal, with its reflection in the tranquil waters of the central pool, was a sight I will never forget.\r\n\r\nExploring the intricacies of the monument up close was equally mesmerizing. The delicate inlay work, featuring floral patterns made from semi-precious stones, spoke volumes about the craftsmanship of the artisans who built this masterpiece centuries ago. Inside the mausoleum, the quiet reverence of the space where Shah Jahan and Mumtaz Mahal rest in eternal peace added a solemn, spiritual dimension to the visit. \r\n\r\nThe surrounding gardens, with their neatly manicured lawns and pathways, provided a peaceful retreat to admire the monument from various angles. The play of light on the marble—shifting from a soft golden glow in the morning to a silvery radiance at sunset—added a magical quality to the experience. Standing before the Taj Mahal, I couldn’t help but feel a deep sense of appreciation for this timeless symbol of love and its enduring place in history. Visiting the Taj Mahal was not just a journey to a historical site; it was a profound encounter with beauty, history, and emotion.', 'nareshkumarmahanta10@gmail.com', 'travel,nature,love,tajmahal', '6780d4e800f121.36891413.jpg', 'Turist', '2025-01-10 13:36:00', 0),
(10, 'Chhatrapati Shivaji: The Warrior King of India', 'Shivaji Maharaj, one of India\'s most revered historical figures, was the founder of the Maratha Empire and a symbol of valor, strategy, and patriotism. Born on **February 19, 1630**, in the hill-fort of Shivneri in present-day Maharashtra, Shivaji grew up under the influence of his mother, Jijabai, and the teachings of his mentor, Dadaji Konddeo. These early influences instilled in him a sense of duty, justice, and devotion to his land.\r\n\r\nShivaji’s early military campaigns were marked by his guerrilla warfare tactics, which he used to challenge the mighty Mughal Empire and other regional powers. His first significant victory came in 1645, when he captured the Torna Fort, marking the beginning of his quest to establish a sovereign Maratha kingdom. Over time, Shivaji continued to expand his territory, capturing forts and building a strong naval force, making the Marathas a formidable power in the Deccan region.\r\n\r\nIn 1674, Shivaji was crowned **Chhatrapati (King)** at Raigad Fort, formalizing his kingdom and asserting his independence from Mughal domination. Known for his administrative acumen, he established an efficient system of governance, emphasizing justice, welfare, and the protection of his subjects, irrespective of their religion. Shivaji was a secular leader who promoted religious harmony, respecting both Hindu and Muslim traditions.\r\n\r\nShivaji’s military strategies were revolutionary. He is often credited as the pioneer of guerrilla warfare in India, using the rugged terrain of the Western Ghats to outmaneuver his enemies. His navy, one of the first of its kind in Indian history, played a critical role in protecting the Konkan coast from foreign invasions, particularly from the Portuguese and Siddis.\r\n\r\nShivaji\'s legacy extends far beyond his military conquests. He is remembered as a champion of the common people and a protector of Indian culture and traditions during a period of foreign domination. His emphasis on swarajya (self-rule) and swadharma (self-discipline) became rallying cries for later movements against colonial rule in India.\r\n\r\nShivaji Maharaj passed away on **April 3, 1680**, at Raigad Fort, but his vision and ideals continued to inspire the Marathas and later generations. Today, he remains a source of pride and inspiration for millions, celebrated as a legendary leader who fought tirelessly for the freedom and dignity of his people.', 'nareshkumarmahanta10@gmail.com', 'shivaji,king shivaji', '6780da2b879775.47087270.jpg', 'history', '2025-01-10 13:58:27', 0),
(11, 'Sanaghagara is an Odia word meaning ‘small waterfall’', 'There is something truly special about this waterfall in Keonjhar district that travelers from all over the world make sure to visit. Sanaghagra which usually has a small waterfall is one of the top places to visit in Odisha to enjoy the splendid side of nature. Situated 8 km from Keonjhar town, this waterfall falls from a height of 30.5 meters and has become a famous picnic spot in Odisha over time.', 'nareshkumarmahanta10@gmail.com', 'waterfall,keojhar', '6780f997832ca1.26798194.jpg', 'Nature', '2025-01-10 16:12:31', 0),
(12, 'Barehipani Waterfall Odisha', 'It\'s the altruistic nature of Odisha that it lets travellers come and take joy at the sight of the second highest fall across India, Barehipani. This waterfall shares land with the Simlipal National Park settled in the Mayurbhanj district which is known for sheltering wild elephants, gaurs (Indian bison), Bengal tigers and chausingha(four horned antelope).It is the River Budhabalanga that lets this waterfall cuddle and flow over the mighty Meghasani mountain. One of the most interesting thing about this famous waterfall in Odisha is its two drop that descends from a wife cliff with a height of 399 m where the tallest drop ranges 259 m. Furthermore, those who are visiting the national park for sighting the Bengal and White Tiger, their experience becomes even exciting and wonderful with the presence of this popular tourist attraction amid the thriving vegetation of the region. Travellers love to stop and stare at the beauty of the height of Barehipani Fall and also the crashing sound it makes while coming all the way down. Tourists can also choose to visit, another popular waterfall in Odisha, Joranda Fall which makes its name as the 19th highest waterfall in the country and is settled inside the Simlipal National Park.\r\n\r\n', 'nareshkumarmahanta10@gmail.com', 'bareipani,waterfall', '6780f9e0af83f0.91731087.jpg', 'Nature', '2025-01-10 16:13:44', 0),
(13, 'Nrusinghanath Waterfall Odisha', 'The vivacious environs of this waterfall in Odisha are such that travellers flock in numbers every year just to feel refreshed. Nrusinghanath Waterfall is settled close to the famed Nrusinghanath Temple which finds its place at the foothills of Gandhamardan Hill towards the north. Surrounded by dark forests and hilly terrain, the waterfall is a must visit place in Bargarh District for those who love natural settings and like spending time close to mother nature. Along with visiting the waterfall, pilgrims also take a spiritual tour to Nrusinghanath Temple which was founded in the 14th century where they worship Lord Nrusinghnath(avatar of Lord Vishnu). The best time to visit here is considered to fall between October to March, where travellers can also take a sightseeing tour to Gadadhar, Pitrudhar, Guptadhar, Bhimadhar, Kapiladhar, and Chaladhar which are some other popular waterfalls at Nrusinghanath.\r\n\r\n', 'nareshkumarmahanta10@gmail.com', 'nrusingha nath,waterfall', '6780fb71c05f58.28244730.jpg', 'nature', '2025-01-10 16:20:25', 0),
(14, 'Konark Sun Temple', 'Konark Sun Temple is a 13th-century CE Hindu Sun temple at Konark about 35 kilometres (22 mi) northeast from Puri city on the coastline in Puri district, Odisha, India.[1][2] The temple is attributed to king Narasingha Deva I of the Eastern Ganga dynasty about 1250 CE.\r\n\r\nDedicated to the Hindu Sun-god Surya, what remains of the temple complex has the appearance of a 100-foot (30 m) high chariot with immense wheels and horses, all carved from stone. Once over 200 feet (61 m) high,[1][5] much of the temple is now in ruins, in particular the large shikara tower over the sanctuary; at one time this rose much higher than the mandapa that remains. The structures and elements that have survived are famed for their intricate artwork, iconography, and themes, including erotic kama and mithuna scenes. Also called the Surya Devalaya, it is a classic illustration of the Odisha style of Architecture or Kalinga architecture.\r\n\r\nThe cause of the destruction of the Konark temple is unclear and still remains a source of controversy. Theories range from natural damage to deliberate destruction of the temple in the course of being sacked several times by Muslim armies between the 15th and 17th centuries.This temple was called the \"Black Pagoda\" in European sailor accounts as early as 1676 because it looked like a great tiered tower which appeared black.[6][8] Similarly, the Jagannath Temple in Puri was called the \"White Pagoda\". Both temples served as important landmarks for sailors in the Bay of Bengal.[9][10] The temple that exists today was partially restored by the conservation efforts of British India-era archaeological teams. Declared a UNESCO World Heritage Site in 1984 it remains a major pilgrimage site for Hindus, who gather here every year for the Chandrabhaga Mela around the month of February.\r\n\r\nKonark Sun Temple is depicted on the reverse side of the Indian currency note of 10 rupees to signify its importance to Indian cultural heritage.', 'nareshkumarmahanta10@gmail.com', 'konark,sun temple,odisha', '6780fcd66d0f88.14291471.jpg', 'history', '2025-01-10 16:26:22', 0),
(15, 'The Rise of AI in Front-End Development: What You Need to Know', 'Artificial Intelligence (AI) is revolutionizing front-end development by streamlining workflows, enhancing design efficiency, and optimizing user experiences. AI-powered tools like Figma and Adobe Firefly are automating repetitive design tasks, enabling developers to focus on creativity and innovation. Code generation tools such as GitHub Copilot and TabNine simplify coding by providing intelligent suggestions and debugging assistance, reducing development time significantly. AI also plays a crucial role in improving accessibility, enabling developers to build inclusive designs with features like automated alt text generation and color contrast analysis. As AI continues to evolve, it’s reshaping the front-end landscape, empowering developers to build smarter, faster, and more user-friendly applications.', 'nareshkumarmahanta10@gmail.com', 'web developement,frontend developement,technology', '6780fdebd00e63.16059907.jpeg', 'Technology', '2025-01-10 16:30:59', 0),
(16, 'The Rise of AI-Powered Front-End Development: Trends and Tools to Watch in 2025', 'The world of front-end development is experiencing a revolution, with AI-powered tools leading the charge in 2025. From intelligent code assistants like GitHub Copilot to automated design tools in platforms like Figma, AI is streamlining workflows and unlocking new levels of productivity. Developers can now leverage natural language processing to convert plain text into code, speeding up prototyping and reducing development time. Performance optimization has also taken a leap forward, with AI analyzing user behavior and offering predictive improvements for enhanced website speed and user experience. Furthermore, AI-driven personalization is enabling developers to create dynamic, tailored interfaces that adapt to individual users in real-time. Far from replacing developers, these advancements highlight how AI is becoming an indispensable ally, empowering professionals to push the boundaries of creativity and innovation in web development. ', 'nareshkumarmahanta10@gmail.com', 'tech,technology,ai', '6780ff970aece1.46041353.jpeg', 'Technology', '2025-01-10 16:38:07', 0),
(17, 'AI-Powered Development Tools', 'Artificial Intelligence is revolutionizing front-end development by automating repetitive tasks, suggesting code improvements, and optimizing user interfaces. Tools like GitHub Copilot and ChatGPT are now integrated into development workflows, helping developers write better code faster. As AI continues to evolve, its impact on productivity and creativity in front-end development is set to grow exponentially.', 'nareshkumarmahanta10@gmail.com', 'tech,technology,ai', '67821c7eccbf08.07697882.jpeg', 'Technology', '2025-01-11 12:53:42', 0),
(18, 'The Rise of Web3 and Decentralization', 'Web3 is transforming the internet by introducing decentralized technologies like blockchain and smart contracts. Front-end developers are now designing interfaces for decentralized applications (dApps), which prioritize user privacy, security, and ownership of data. Frameworks like Ethers.js and web3.js are becoming essential tools for building these next-generation web experiences.', 'nareshkumarmahanta10@gmail.com', 'web,website', '67821cc61dc309.38475873.jpeg', 'Technology', '2025-01-11 12:54:54', 0),
(19, 'Enhanced User Experiences with WebXR', 'As augmented reality (AR) and virtual reality (VR) technologies gain traction, WebXR APIs are enabling developers to create immersive and interactive web experiences. From virtual showrooms to AR-enhanced e-commerce, front-end developers are crafting dynamic environments that redefine how users interact with websites and applications.', 'nareshkumarmahanta10@gmail.com', 'we,website', '67821d11580940.89727922.png', 'Technology', '2025-01-11 12:56:09', 0),
(20, 'Pixel Odyssey', '**Pixel Odyssey** is a thrilling retro-inspired platformer that combines classic gameplay mechanics with a fresh and modern narrative. The story begins when a mysterious cosmic disturbance sends the universe into chaos, disrupting the natural harmony of the stars. As the daring young explorer **Nova**, you are tasked by the intergalactic council to uncover the source of the disruption and restore balance to the galaxy.  \r\n\r\nEach planet you visit is a beautifully crafted, pixel-art masterpiece with unique biomes, inhabitants, and challenges. From lush alien jungles to icy wastelands and mechanical cities, every level is packed with secrets to discover, puzzles to solve, and enemies to outsmart. Along the way, you\'ll collect powerful upgrades, unlock hidden abilities, and forge alliances with quirky NPCs, each offering their own side quests and lore.  \r\n\r\nThe game emphasizes exploration and creativity, allowing players to customize Nova’s tools and gadgets to suit their playstyle. Whether you prefer to focus on solving intricate puzzles, mastering fast-paced platforming, or engaging in tactical combat, **Pixel Odyssey** offers something for everyone.  \r\n\r\nWith its nostalgic 8-bit art style, dynamic level designs, and a rich, emotionally driven storyline, **Pixel Odyssey** is more than just a game—it\'s an epic journey through a universe brimming with charm, wonder, and endless adventure.', 'knightkingbr46@gmail.com', 'gameing,gamedevloper,pixelgame,devloper', '6782a509585110.10341891.jpg', 'gamedevloper', '2025-01-11 22:36:17', 0),
(21, 'The Esports Arena Gameing Setup', '### **The Esports Arena**  \r\nThe Esports Arena is the ultimate setup for competitive gamers looking to maximize their potential and immerse themselves in high-performance gaming. Every detail of this setup is designed to prioritize speed, precision, and comfort, ensuring that you’re equipped to take on the most demanding challenges.  \r\n\r\n#### **Key Components:**  \r\n\r\n1. **Monitors**:  \r\n   - A high-refresh-rate monitor (240Hz or 360Hz) with ultra-low response times (1ms or less) ensures buttery-smooth gameplay and razor-sharp visuals. For multi-tasking, consider adding a second monitor for chat, streaming, or game analytics.  \r\n\r\n2. **PC Specifications**:  \r\n   - A powerful gaming PC with the latest GPU (such as NVIDIA RTX 40-series or AMD RX 7000-series) and a high-speed CPU ensures seamless performance in graphically intensive games. Pair this with at least 16GB or 32GB of RAM for smooth multitasking and faster load times.  \r\n\r\n3. **Peripherals**:  \r\n   - **Keyboard**: A tenkeyless mechanical keyboard with customizable switches ensures fast, precise inputs with plenty of desk space for mouse movement.  \r\n   - **Mouse**: A lightweight, high-DPI gaming mouse with adjustable sensitivity ensures accuracy and comfort during long sessions.  \r\n   - **Headset**: A high-quality headset with surround sound for precise audio positioning is crucial in competitive games where every sound matters.  \r\n   - **Controller (Optional)**: For games that require controllers, choose a customizable pro controller with additional paddles and adjustable sensitivity.  \r\n\r\n4. **Desk and Chair**:  \r\n   - A spacious, adjustable-height gaming desk provides plenty of room for peripherals and accessories. Cable management features keep the setup clean and clutter-free.  \r\n   - An ergonomic gaming chair with lumbar and neck support ensures comfort and proper posture, even during marathon gaming sessions.  \r\n\r\n5. **Lighting and Ambience**:  \r\n   - RGB lighting synced across your peripherals and PC creates an energetic atmosphere that reflects your style. Install LED strips around the desk or monitor for a more immersive experience.  \r\n\r\n6. **Internet Connection**:  \r\n   - A high-speed wired Ethernet connection minimizes latency and packet loss, giving you the edge in fast-paced games.  \r\n\r\n#### **Additions for Streamers and Content Creators**  \r\nIf you plan to stream your competitive gameplay, integrate tools like a high-definition webcam, a professional-grade microphone with a boom arm, and capture cards for seamless streaming. Software like OBS Studio or Streamlabs helps manage your streams with overlays and alerts.  \r\n\r\n#### **The Experience**  \r\nThe Esports Arena is about more than just equipment—it\'s about creating a space that keeps you focused and inspired. With this setup, every aspect of your gaming experience is optimized for peak performance, whether you’re competing in ranked matches, joining tournaments, or streaming to an audience of fans.  \r\n\r\nWould you like a detailed list of products or recommendations to build this setup?', 'knightkingbr46@gmail.com', 'roomsetup,gamelover,gamesetup,desktop', '6782a700d1c495.35253465.jpg', 'gamesetup', '2025-01-11 22:44:40', 0),
(22, 'Straight Photography: Capturing Reality Unfiltered', 'Straight Photography is a style of photography that emphasizes realism, clarity, and the unembellished representation of the subject. Born in the early 20th century as a response to the heavily manipulated images of pictorialism, straight photography aims to capture moments exactly as they appear, celebrating the natural interplay of light, shadow, texture, and form.  \r\n\r\nThis approach is defined by sharp focus, precise framing, and an avoidance of post-processing techniques that alter the integrity of the scene. It highlights the authenticity of the subject, whether it’s the raw emotion of a street portrait, the geometric beauty of architecture, or the intricate details of nature.  \r\n\r\nStraight photography is not merely about documentation; it’s an artistic discipline that demands attention to composition, timing, and perspective. The photographer acts as a visual storyteller, presenting reality in its purest form while inviting viewers to interpret the scene through their own lens.  \r\n\r\nWould you like to explore the techniques, history, or notable photographers associated with this style?', 'knightkingbr46@gmail.com', 'capure real picture,photo staright,lovingpicture,realworld', '6782a907edaf05.04485770.jpg', 'staright photographer', '2025-01-11 22:53:19', 0),
(23, 'Faces of Tomorrow: A Rising Star in the Spotlight', 'In the ever-evolving world of fashion and advertising, the demand for fresh, dynamic faces is constant—and he is poised to become one of them. With his sharp jawline, captivating eyes, and an aura of effortless confidence, he’s not just entering the modeling industry; he’s redefining what it means to be a modern male model.  \r\n\r\nHis journey begins with crafting a portfolio that highlights his versatility. From casual streetwear campaigns that showcase his relaxed charm to high-end editorial shoots where he exudes sophistication, each photograph tells a story. Beyond just looks, he brings an emotional depth to his poses, making every image memorable and impactful.  \r\n\r\nThe world of modeling is about more than standing in front of a camera—it’s about becoming a chameleon, adapting to different styles, brands, and artistic visions. Whether strutting down the runway in tailored suits or posing for cutting-edge fashion magazines, his ability to embody a brand’s identity sets him apart from the rest.  \r\n\r\nNetworking plays a key role in his journey. Building relationships with photographers, designers, and casting agents helps open doors to exciting opportunities, from commercial campaigns to international fashion shows. Alongside this, staying fit and maintaining a healthy lifestyle ensures he’s always camera-ready and capable of meeting the physical demands of the profession.  \r\n\r\nWith time, his career will evolve to include not just modeling but also being a spokesperson for brands, collaborating on creative projects, or even mentoring future models. As he rises through the ranks, he’s not just becoming a face of tomorrow—he’s shaping the future of the modeling industry itself.  \r\n\r\nWould you like tips on how to build a strong modeling portfolio or insights into preparing for casting calls?', 'knightkingbr46@gmail.com', 'modeling,photoshoot,star,model', '6782ab7fba3b75.95109651.jpg', 'model', '2025-01-11 23:03:51', 0),
(24, 'The Epitome of Beauty: A New Era Begins', 'Female supermodels have long been at the forefront of shaping the fashion industry, not only as faces of iconic brands but also as powerful symbols of confidence, strength, and individuality. These women have broken barriers, redefined beauty standards, and used their platforms to inspire millions. Models like **Cindy Crawford**, **Kate Moss**, and **Gisele Bündchen** have elevated the art of modeling to an empire of influence, with their careers extending far beyond the runway.  \r\n\r\nThese women are more than just models; they are entrepreneurs, activists, and role models. They have used their fame to champion important causes, such as body positivity, environmental sustainability, and social justice. In addition to their modeling careers, many have launched successful businesses, written books, and become global advocates for various humanitarian efforts.  \r\n\r\nThe rise of female empowerment in the modeling world has also ushered in a new generation of stars who embrace authenticity and diversity. Modern icons like **Bella Hadid**, **Adut Akech**, and **Liu Wen** are changing the narrative of what it means to be a \"model,\" showing that beauty is not confined to one look or size but encompasses individuality, strength, and resilience.  \r\n\r\nIn this ever-evolving industry, female supermodels continue to redefine what it means to be a \"star\" in the modeling world. They embody grace, power, and the ability to influence change, standing as leaders in an empire built on self-expression and confidence.', 'knightkingbr46@gmail.com', 'bulding,famous,actress,roalmodel,realworld model', '6782acd10f8f59.78089900.jpg', 'actrss modeling poster', '2025-01-11 23:09:29', 0),
(25, 'The Skyline Tower: A Masterpiece of Modern Architecture', 'Standing tall as a symbol of progress and innovation, the Skyline Tower is more than just a building; it is a marvel of contemporary engineering and design. This iconic structure dominates the city’s skyline with its breathtaking height and striking architectural features, including its sleek glass façade that reflects the hues of sunrise and sunset, making it a dynamic presence throughout the day. Designed with sustainability in mind, the Skyline Tower incorporates cutting-edge green technologies, such as energy-efficient systems, solar panels, and lush vertical gardens, creating an eco-friendly environment that harmonizes with the urban landscape. Inside, the building offers a seamless blend of luxury and functionality, with expansive residential units, state-of-the-art office spaces, and world-class amenities, including a rooftop infinity pool, a high-end fitness center, and exclusive dining options. The Skyline Tower is not just a place to live or work; it is a destination where comfort meets convenience, and innovation meets elegance. Perfectly located in the heart of the city, it provides easy access to shopping districts, cultural landmarks, and transportation hubs, making it the ultimate address for modern urban living. Whether you’re seeking a prestigious home, a premium workspace, or a prime investment opportunity, the Skyline Tower invites you to experience life at its finest. Embrace the future of city living and secure your place in this architectural masterpiece today!', 'kumar@gmail.com', 'city bulding,construction,working,bulding construction,enginering', '6783abd5985649.52929072.jpg', 'construction', '2025-01-12 17:17:33', 0),
(26, 'The Grand Arcadia: A Visionary Shopping Mall for Modern Experiences', 'The Grand Arcadia is set to redefine the shopping and entertainment experience, offering a visionary architectural masterpiece that blends luxury, innovation, and sustainability. Spanning millions of square feet, this colossal shopping mall will feature a sleek and futuristic design with a vast glass dome that floods the interiors with natural light, creating a vibrant and inviting atmosphere. Its façade combines modern aesthetics with functional elements, including eco-friendly materials, vertical gardens, and energy-efficient systems, making it a sustainable landmark for generations to come.  \r\n\r\nInside, The Grand Arcadia is an ecosystem of experiences, with over 500 retail outlets, including high-end fashion brands, technology hubs, and bespoke boutiques. The mall’s grand atrium, adorned with art installations and cascading water features, serves as a central gathering point that exudes elegance. Entertainment options abound, from an expansive multiplex cinema to a state-of-the-art virtual reality zone and a world-class gaming arcade. Food lovers will be delighted with the gourmet food court and rooftop dining terraces, offering cuisines from around the globe alongside breathtaking city views.  \r\n\r\nThe Grand Arcadia is not just a shopping mall; it is a cultural and social hub designed to cater to diverse lifestyles. Its strategic location ensures easy accessibility, while ample parking spaces and advanced navigation systems make visiting seamless. From families and fashion enthusiasts to tech aficionados and leisure seekers, The Grand Arcadia promises something extraordinary for everyone. Experience the future of retail and entertainment at The Grand Arcadia, where dreams come alive under one magnificent roof.', 'kumar@gmail.com', 'shoppingmall,construction,menteance,brandingmall,structre mall', '6783ad957caae9.47447111.jpg', 'construction', '2025-01-12 17:25:01', 0),
(27, 'Efficient Transportation of Construction Materials: Rocks and Stones', 'Transporting construction materials like rocks and stones is a critical aspect of building projects, requiring precision and planning to ensure efficiency and cost-effectiveness. These materials, often sourced from quarries or natural deposits, are essential for creating robust foundations, walls, and other structural elements. The transportation process typically involves heavy-duty trucks, rail systems, or barges, depending on the distance and scale of the project.  \r\n\r\nModern techniques optimize the movement of these dense and heavy materials. Cranes, loaders, and conveyor belts are commonly used to load and unload materials, ensuring minimal damage during transit. For large-scale projects, bulk carriers equipped with advanced weight distribution systems help prevent overloading and maintain safety standards. Additionally, crushed stone and gravel are often transported in modular containers to streamline the handling process.  \r\n\r\nSustainability in transportation is becoming a growing priority, with many companies adopting fuel-efficient vehicles and integrating technology to reduce carbon emissions. Proper packaging and securing methods, such as tarps and straps, ensure that materials arrive at the construction site in optimal condition. By leveraging logistics and innovative transportation solutions, the journey of rocks and stones—from source to site—is managed with precision, supporting the construction of enduring structures that stand the test of time.', 'kumar@gmail.com', 'construction elements,rocks,sand,elements,transport', '6783af47564ff7.51051771.jpg', 'construction', '2025-01-12 17:32:15', 0),
(28, ' The Celestial Haven: A Luxurious Retreat Above the Ordinary', 'Perched majestically amidst the cityscape, The Celestial Haven redefines opulence and elegance in the world of luxury hospitality. This architectural marvel seamlessly blends contemporary design with timeless sophistication, creating an iconic structure that stands as a testament to grandeur. The hotel’s striking façade, crafted with shimmering glass panels and intricate metalwork, reflects the ever-changing hues of the sky, making it a beacon of modern luxury.  \r\n\r\nInside, The Celestial Haven is a sanctuary of comfort and refinement. The grand lobby, adorned with crystal chandeliers, imported marble floors, and bespoke artwork, sets the tone for an unparalleled experience. The hotel offers an array of meticulously designed suites and rooms, each boasting panoramic views, plush furnishings, and state-of-the-art amenities. Guests can indulge in a world-class spa, a rooftop infinity pool overlooking the skyline, and an array of dining options featuring Michelin-starred chefs and gourmet cuisines from around the globe.  \r\n\r\nBeyond its exquisite interiors, The Celestial Haven prioritizes sustainability and innovation, integrating green technologies and eco-friendly practices throughout its operations. With its prime location offering easy access to cultural landmarks, shopping districts, and business hubs, The Celestial Haven is more than a hotel—it’s a destination. Whether for leisure or business, every moment here is curated to perfection, inviting you to experience a lifestyle above the ordinary.', 'kumar@gmail.com', 'laxury hotel,construn sucess,hotel,laxury brand hotel', '6783b0feb16925.00864822.jpg', 'laxury hotel', '2025-01-12 17:39:34', 0),
(29, 'How Can Construction Companies Optimize Logistics for Large-Scale Material Transport?', 'Transporting rocks and construction materials involves a carefully organized process to ensure the safe and efficient movement of heavy and bulky materials from extraction sites (such as quarries) to construction locations. The process typically requires specialized equipment and logistics management to handle materials like rocks, stones, gravel, and aggregates. Here’s an overview of the common methods used:\r\n\r\n1. **Trucks and Dumpers**:  \r\n   For short to medium distances, heavy-duty trucks are the most common mode of transportation. These vehicles are equipped with large capacity beds to carry various types of rock, from large boulders to crushed stone. Dump trucks, flatbeds, or specialized hauling vehicles ensure the materials are safely loaded and unloaded.\r\n\r\n2. **Rail Systems**:  \r\n   For transporting large quantities of rocks over long distances, trains are often utilized, especially when dealing with bulk construction materials. Railcars designed for hauling heavy loads are filled with aggregate or stones, offering a more efficient and cost-effective solution compared to road transport, particularly when multiple tons need to be moved.\r\n\r\n3. **Barges and Ships**:  \r\n   For construction projects near coastal areas or waterways, barges are a preferred method for transporting large quantities of rock and stone. Cargo ships can also be used for long-distance transportation, particularly for international construction projects, to move materials like granite or limestone.\r\n\r\n4. **Conveyor Belts**:  \r\n   When rocks are being moved from quarries to nearby processing plants or storage yards, conveyor belts are often used. They provide a continuous, efficient means of transporting bulk materials without the need for additional vehicles, minimizing the risk of material damage.\r\n\r\n5. **Cranes and Loaders**:  \r\n   Loading and unloading rocks from vehicles, ships, or railcars often requires specialized equipment like cranes and front-end loaders. These machines are used to lift heavy stones and place them onto transport vehicles or stockpiles.\r\n\r\n6. **Heavy Hauling Equipment**:  \r\n   When dealing with extremely large boulders or specialized rock types, heavy hauling equipment such as lowboy trailers or multi-axle flatbed trailers are used to accommodate oversized loads. These are typically employed for transporting unique or large-scale stones that can\'t be carried by regular trucks.\r\n\r\nEfficient planning and coordination of the logistics, including route management, safety measures, and appropriate equipment, are crucial to ensure that the rocks are transported without damage, on schedule, and within budget.', 'kumar@gmail.com', 'transpoting,material,rocks sand,constructon material', '6783b2c4997c95.45207519.jpg', 'transpoting', '2025-01-12 17:47:08', 0);
INSERT INTO `blogs_tbl` (`id`, `title`, `description`, `userMail`, `tags`, `image`, `category`, `createdAt`, `viewCount`) VALUES
(30, 'How to Build a Road: Key Steps in Road Construction', 'Road construction is a critical process in the development of infrastructure that ensures the smooth movement of goods and people. The process involves several stages, from planning and design to construction and maintenance. Here’s an overview of the typical phases and key considerations involved in road construction:\r\n\r\n1. **Planning and Design**:  \r\n   The road construction process begins with a thorough planning phase that includes surveying, environmental impact assessments, and feasibility studies. Engineers design the road layout, determine the type of materials to be used, and plan for drainage, traffic management, and road safety features. The design phase ensures that the road will meet the demands of traffic volume and environmental conditions.\r\n\r\n2. **Clearing and Excavation**:  \r\n   Once the design is finalized, the construction site is cleared of vegetation, debris, and any obstructions. Excavators and bulldozers are used to level the ground and prepare the subgrade. This step ensures a solid foundation for the road. In some cases, rock blasting or soil stabilization may be required.\r\n\r\n3. **Subgrade Preparation**:  \r\n   The subgrade, or the earth beneath the road, is compacted to create a stable base for the road. In some areas, the subgrade may require the addition of gravel, sand, or other materials to ensure stability. Soil stabilization techniques may be applied to improve strength, particularly in areas with poor soil conditions.\r\n\r\n4. **Base Layer Construction**:  \r\n   The next step is to add a base layer made of materials such as crushed stone, gravel, or asphalt. This layer provides additional support and helps to distribute traffic loads evenly. It is also compacted to ensure durability and prevent settling over time.\r\n\r\n5. **Paving and Surface Layer**:  \r\n   The road surface is created by laying down layers of asphalt or concrete. For asphalt roads, hot mix asphalt is spread over the compacted base and leveled using pavers. For concrete roads, forms are set up, and the concrete is poured, spread, and smoothed. The surface layer is designed to provide a smooth, durable driving surface that can withstand heavy traffic loads.\r\n\r\n6. **Drainage Systems**:  \r\n   Proper drainage is essential to prevent water from accumulating on the road surface, which can lead to damage. Drainage systems, such as culverts, ditches, and stormwater systems, are installed to direct water away from the road.\r\n\r\n7. **Road Markings and Signage**:  \r\n   Once the road surface is completed, road markings, such as lane markings, pedestrian crossings, and directional arrows, are applied. Traffic signs, signals, and barriers are also installed to ensure road safety and guide drivers effectively.\r\n\r\n8. **Quality Control and Inspection**:  \r\n   Throughout the construction process, various quality control measures are taken to ensure the road is built to specification. Testing for compaction, material quality, and structural integrity is performed. Once the construction is complete, the road is thoroughly inspected before it is opened for use.\r\n\r\n9. **Maintenance and Rehabilitation**:  \r\n   After the road is completed and in use, regular maintenance is required to keep the road in good condition. This includes patching potholes, resurfacing, repairing cracks, and clearing drainage systems. Over time, roads may also require rehabilitation, such as a full resurfacing or rebuilding of the base.\r\n\r\nRoad construction plays a vital role in enhancing connectivity and supporting economic growth. The combination of advanced engineering, construction techniques, and sustainable practices ensures the creation of safe, durable, and reliable road infrastructure.', 'kumar@gmail.com', 'road construction,repair,construction,road material,civil,new road,keys material', '6783b6946ab7a6.55702934.jpg', 'construction', '2025-01-12 18:03:24', 0),
(31, 'Building Your Future: How to Become a Construction Engineer', 'Becoming a construction engineer is an exciting and rewarding career path that requires a combination of education, practical experience, and continuous learning. The first step in this journey is earning a **bachelor’s degree** in construction engineering, civil engineering, or a related field. Throughout your studies, you will be introduced to a variety of topics such as **construction management**, **materials science**, **building systems**, **structural analysis**, and **project planning**. These foundational courses equip you with the knowledge to understand how infrastructure is designed, built, and maintained.  \r\n\r\nIn addition to the theoretical aspects, gaining **practical experience** through internships or cooperative education (co-op) programs is essential. These opportunities allow you to apply your knowledge in real-world settings, work alongside experienced professionals, and learn about the challenges and nuances of the construction industry. Whether it’s assisting with project management, working on-site with construction teams, or helping with design and planning, these hands-on experiences are crucial for building the skills necessary for a successful career.  \r\n\r\nOnce you complete your education and gain experience, many construction engineers choose to become **licensed professionals** by obtaining a **Professional Engineer (PE) license**. This typically involves passing the **Fundamentals of Engineering (FE) exam**, which tests your understanding of core engineering principles. After completing the required work experience (usually four years), you can sit for the **Principles and Practice of Engineering (PE) exam**, which demonstrates your ability to handle more complex projects and gives you the authority to sign off on engineering work and take on larger responsibilities. Holding a PE license is essential for advancing in the field and taking leadership roles in major construction projects.  \r\n\r\nThroughout your career, it’s important to **develop both technical and soft skills**. As a construction engineer, you will work closely with architects, clients, contractors, and other engineers. Therefore, effective **communication** and **project management** skills are crucial for ensuring projects are completed smoothly, safely, and within budget. Construction engineers also need to be adept at **problem-solving** since challenges and unexpected issues often arise during construction. For example, weather delays, supply chain disruptions, or design modifications may require quick thinking and innovative solutions.  \r\n\r\nWith experience and continued education, construction engineers have the opportunity to **specialize** in areas like **structural engineering**, **geotechnical engineering**, **environmental engineering**, or **construction management**. Specializing in a particular area can offer more focused career paths and open up opportunities for advancement. As you gain experience, you may transition into **project management** roles, where you will oversee the entirety of a construction project, manage teams of engineers, contractors, and workers, and ensure that projects are completed successfully.  \r\n\r\nAdditionally, construction engineers are constantly exposed to new technologies and construction practices, from sustainable building materials to advanced construction software. Therefore, lifelong learning is a key component of this career. Many engineers attend workshops, seminars, and pursue certifications in advanced project management or specific construction software programs to keep their skills up to date and stay competitive in the industry.  \r\n\r\nIn conclusion, becoming a construction engineer is a fulfilling journey that combines education, hands-on experience, problem-solving, and a passion for building and improving infrastructure. With opportunities for growth, specialization, and leadership, it is a career path that allows you to have a lasting impact on communities, economies, and the environment by helping to shape the structures and systems people rely on every day.', 'kumar@gmail.com', 'enginereening,construction,eduction,guide,stepbystep,construction enginereening', '6783b8318d9191.70166090.jpg', 'construction', '2025-01-12 18:10:17', 0),
(32, 'Dhauli Shanti Stupa: A Symbol of Peace and Transformation', 'Dhauli Shanti Stupa, also known as the Peace Pagoda, is a prominent Buddhist monument located near Bhubaneswar, Odisha. Built in 1972 through a collaboration between the Japan Buddha Sangh and the Kalinga Nippon Buddha Sangha, it symbolizes peace and harmony. Dhauli holds historical significance as the site of the Kalinga War, which transformed Emperor Ashoka, leading him to embrace Buddhism and propagate nonviolence. The stupa’s elegant dome-shaped structure, adorned with intricate carvings of Buddha and scenes from his life, stands atop a hill, offering a serene atmosphere and panoramic views. Nearby, Ashokan rock edicts inscribed in Brahmi script emphasize moral values and peace.', 'kumar@gmail.com', 'odisha,dhauli', '6783ebd634dbd4.12551153.jpeg', 'History', '2025-01-12 21:50:38', 0),
(33, 'Jagannath Temple, Puri: A Sacred Heritage of Devotion and Mythology', 'The Jagannath Temple in Puri, Odisha, is a sacred Hindu shrine dedicated to Lord Jagannath, an incarnation of Lord Vishnu, along with his siblings Balabhadra and Subhadra. Built in the 12th century by King Anantavarman Chodaganga Deva of the Eastern Ganga dynasty, the temple is renowned for its unique wooden idols, replaced during the Nabakalebara ritual every 12 to 19 years. Its origins are steeped in mythology, with stories of King Indradyumna constructing the temple under divine guidance and the deities’ transformation from Nilamadhava, worshiped by a tribal king. A cornerstone of the Char Dham Yatra, the temple symbolizes spiritual unity and attracts millions of devotees annually.', 'kumar@gmail.com', 'temple,history,odisha,jagannath temple', '6783ec71e87538.59208029.jpeg', 'history', '2025-01-12 21:53:13', 0),
(34, 'Dwarka: The Sacred City of Lord Krishna and Ancient Heritage', 'Dwarka, located in Gujarat, is a city of profound mythological and religious significance, famously known as the \"City of Lord Krishna.\" According to Hindu mythology, it was the capital of Krishna’s kingdom, built on land reclaimed from the sea, and described as a golden, opulent city in ancient texts like the Mahabharata. After Krishna’s departure, it is believed the city submerged into the sea, a tale supported by marine archaeological discoveries of submerged structures. Historically, Dwarka was an important trade center dating back to the Harappan Civilization. Today, it is a major pilgrimage site, home to the Dwarkadhish Temple, a stunning Chalukya-style structure dedicated to Krishna, and a vital stop in the Char Dham Yatra.', 'kumar@gmail.com', 'hostory,dwarika,shree krishna', '6783ed30401209.30515777.jpeg', 'history', '2025-01-12 21:56:24', 1),
(35, 'The History of India: A Journey Through Time and Civilization', 'India\'s history is a vast tapestry woven with diverse cultures, religions, and civilizations spanning thousands of years. From the ancient Indus Valley Civilization, one of the world\'s earliest urban cultures, to the rise of powerful empires like the Maurya, Gupta, Mughal, and Maratha empires, India has witnessed remarkable advancements in science, philosophy, and the arts. The spread of Hinduism, Buddhism, Jainism, and Sikhism has shaped the spiritual fabric of the nation. India also endured centuries of foreign rule, most notably by the British, before gaining independence in 1947 through a nonviolent struggle led by figures like Mahatma Gandhi. Today, India\'s rich history continues to influence its vibrant culture, diverse traditions, and its global role in the modern world.', 'rajesh@gmail.com', 'india,history,india history', '6783ee4a527c85.86844743.jpeg', 'history', '2025-01-12 22:01:06', 0),
(36, 'Mountain Adventures: A Journey of Beauty, Challenge, and Reflection', 'Traveling to the mountains offers an unparalleled experience, blending natural beauty with physical challenge and spiritual tranquility. Whether you\'re trekking through the majestic peaks of the Himalayas, exploring the serene landscapes of the Swiss Alps, or hiking through the rugged terrain of the Rockies, the mountains offer a retreat from the hustle of everyday life. The journey up a mountain provides a sense of accomplishment as you ascend through forests, meadows, and rocky paths, with each step revealing new vistas and perspectives. The crisp mountain air, the sound of flowing streams, and the sight of distant snow-capped peaks foster a sense of peace and connection with nature. Additionally, mountain travel often brings an opportunity for self-discovery and reflection, away from distractions. Whether you seek adventure, solitude, or simply a chance to marvel at nature\'s grandeur, the mountains have a way of transforming any journey into an unforgettable experience.', 'kaushik@gmail.com', 'travel,mountain', '6783f0684967f4.85458173.jpeg', 'travel', '2025-01-12 22:10:08', 2),
(37, 'Chasing Waterfalls: A Journey into Nature’s Majestic Beauty', 'Traveling to a waterfall is a magical experience, offering both natural beauty and a sense of serenity. Whether it\'s the thunderous roar of Niagara Falls, the tranquil beauty of Iceland\'s Gullfoss, or the hidden gems tucked away in lush rainforests, waterfalls captivate travelers with their raw power and awe-inspiring beauty. The journey to these stunning natural wonders often involves scenic hikes through forests or along cliff edges, adding to the anticipation. The sight of water cascading down rugged rock faces, surrounded by greenery, creates a peaceful escape from the everyday. The mist that rises from the base, the sound of rushing water, and the breathtaking views make waterfalls perfect destinations for adventure, photography, or simply unwinding. Visiting a waterfall not only offers an opportunity to connect with nature but also provides moments of pure awe and wonder.', 'kaushik@gmail.com', 'waterfall,travel', '6783f0c5af3ae6.97621648.jpeg', 'travel', '2025-01-12 22:11:41', 3),
(38, 'The Joy of Travel: Exploring the World and Creating Lifelong Memories', 'Traveling is one of life’s greatest joys, offering opportunities to explore new cultures, cuisines, landscapes, and experiences. Whether you\'re exploring vibrant cities, relaxing on a beach, hiking through mountains, or immersing yourself in historical landmarks, travel broadens your horizons and enriches your understanding of the world. It offers a break from routine, allowing for personal growth, connections with diverse people, and memories that last a lifetime. With each trip, you encounter unique moments—whether it\'s witnessing a breathtaking sunset, enjoying a local delicacy, or simply enjoying the spontaneity of discovering something new. Traveling isn\'t just about reaching a destination; it\'s about embracing the journey, learning from it, and appreciating the beauty of the world around you.', 'kaushik@gmail.com', 'travel,aeroplane', '6783f129e698a7.65981369.jpeg', 'travel', '2025-01-12 22:13:21', 0),
(39, 'Exploring Odisha: A Journey Through Culture, Heritage, and Nature', 'Traveling to Odisha offers a blend of cultural richness, historical marvels, and natural beauty, making it a unique destination for any traveler. Known for its ancient temples, including the famous Jagannath Temple in Puri and the Sun Temple in Konark, Odisha is a hub of architectural and religious heritage. Beyond temples, the state is home to stunning landscapes, from the serene beaches of Puri and Chandrabhaga to the lush forests of Simlipal National Park. Odisha’s rich tribal culture, colorful festivals like Rath Yatra, and its delectable cuisine—featuring dishes like dalma, rasgulla, and chhena poda—further enhance its appeal. Whether you\'re exploring the historical remnants of ancient civilizations or soaking in the beauty of its natural wonders, Odisha offers a journey through time and tradition.', 'kaushik@gmail.com', 'travel,odisha', '6783f1a20de283.10471830.jpeg', 'travel', '2025-01-12 22:15:22', 0),
(40, 'Winter in Kashmir: A Snowy Paradise of Adventure and Tranquility', 'Traveling to Kashmir in winter is like stepping into a snow-covered paradise, where the landscapes transform into a picturesque winter wonderland. Known for its breathtaking beauty, Kashmir offers a unique experience during the winter months. The snow-capped mountains, frozen lakes, and charming houseboats on Dal Lake create an idyllic setting. Skiing and snowboarding in Gulmarg, one of the top winter sports destinations, attract adventure enthusiasts. The winter months also bring a serene calm to the region, with traditional Kashmiri shawls, kehwa (local tea), and delicious wazwan cuisine offering a warm respite from the cold. Exploring the charming villages, visiting historical landmarks like the Mughal Gardens, and enjoying the tranquil beauty of the valley during winter makes Kashmir a must-visit destination for anyone seeking both adventure and peace in the lap of nature.', 'kaushik@gmail.com', 'kashmir,travel', '6783f1f8008be6.63349507.jpeg', 'travel', '2025-01-12 22:16:48', 7),
(41, 'The Art of Capturing Moments: Exploring Photography and Videography', 'Photography and videography are powerful forms of visual storytelling that capture moments, emotions, and narratives in unique and creative ways. While photography freezes a moment in time, videography brings it to life with motion, sound, and depth, making both mediums complementary and invaluable. From mastering camera settings and composition to leveraging natural light and innovative techniques, these crafts allow creators to express their vision and preserve memories. Modern technology, like mirrorless cameras and advanced editing software, has blurred the lines between the two, enabling seamless transitions between capturing stills and recording cinematic footage. Whether it\'s the golden hour for a perfect photo or a stabilized gimbal shot for a dynamic video, the essence lies in telling stories that resonate and inspire. Together, photography and videography not only document life but also transform ordinary moments into timeless works of art.', 'ashishkumar@gmail.com', 'photography,videography', '67889ba3d2dcb6.01643570.jpeg', 'Photography', '2025-01-16 11:09:47', 2),
(42, 'hr', 'dnnsb', 'adk@gmail.com', 'nx', '678b927fd00bc6.38683237.jpg', 'rh', '2025-01-18 17:07:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blogId` int(11) NOT NULL,
  `commentBy` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `blogId`, `commentBy`, `comment`, `createdAt`) VALUES
(1, 41, 'ashishkumar@gmail.com', 'i want this package', '2025-01-16'),
(5, 41, 'ashishkumar@gmail.com', 'i love photogaphy', '2025-01-16'),
(6, 1, 'ashishkumar@gmail.com', 'ai is great', '2025-01-16'),
(7, 8, 'ashishkumar@gmail.com', 'Beautiful temple in keonjhar', '2025-01-16'),
(9, 39, 'ashishkumar@gmail.com', 'beautiful sunset view', '2025-01-16'),
(10, 39, 'ashishkumar@gmail.com', 'aesthetic view', '2025-01-16'),
(11, 37, 'ashishkumar@gmail.com', 'beautiful waterfall', '2025-01-16'),
(12, 41, 'kaushik@gmail.com', 'i am aslo love photograph', '2025-01-16'),
(13, 36, 'rajesh@gmail.com', 'mountain is aesthetic ', '2025-01-17'),
(14, 37, 'rajesh@gmail.com', 'i want to visit this place next month', '2025-01-17'),
(15, 40, 'rajesh@gmail.com', 'Nice blog', '2025-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `replay` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `createdAt`, `replay`, `status`) VALUES
(1, 'Rajesh Mahanta', 'rajeshkumarmahanta2128@gmail.com', 'blog related', 'heyy this is rajesh', '2025-01-21 12:08:27', 'ok i willl replay you', 2),
(2, 'smarak', 'smarak@gmail.com', 'blog related', 'heyy my blog isuuse', '2025-01-21 12:12:38', 'Ok i resolve it', 2),
(5, 'kaushik parida', 'kaushik@gmail.com', 'heyy', 'hello', '2025-01-21 21:56:49', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `facebook` text NOT NULL DEFAULT '#',
  `twitter` text NOT NULL DEFAULT '#',
  `instagram` text NOT NULL DEFAULT '#',
  `youtube` text NOT NULL DEFAULT '#',
  `linkedin` text NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`) VALUES
(1, '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(1000) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `bio`, `image`, `createdAt`, `email`) VALUES
(1, 'Rajesh', 'this is my bio', 'person_4.jpg', '2025-01-21 09:04:36', 'rajesh@gmail.com'),
(2, 'Naresh', 'heyy this is naresh', 'person_1.jpg', '2025-01-21 10:39:42', 'naresh@gmail.com'),
(3, 'Pririnanda', 'priti meow', 'person_2.jpg', '2025-01-21 10:40:58', 'pritinanda@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `team_content`
--

CREATE TABLE `team_content` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_content`
--

INSERT INTO `team_content` (`id`, `content`, `createdAt`) VALUES
(1, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2025-01-20 23:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `bio` text NOT NULL,
  `country` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `password` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `phone`, `bio`, `country`, `image`, `password`, `createdAt`, `designation`) VALUES
(5, 'Rajesh Kumar', 'rajesh@gmail.com', '8984712930', 'I am a passionate web developer with expertise in creating dynamic, user-friendly websites and applications. I specialize in front-end and back-end development, with experience in HTML, CSS, JavaScript, PHP, and MySQL. I enjoy turning complex problems into simple, elegant solutions and constantly seek to improve my skills through new projects and technologies.', 'india', '677aaf1b6b64a_profile.jpg', '$2y$10$ap/Kdp7LlcBB0TRaaPZMBeofJPJdK5/CetZ7L8RZjLVMgCOgVp3mq', '2025-01-04 18:11:43', 'web developer'),
(6, 'kaushik parida', 'kaushik@gmail.com', '9098909878', 'I am a dedicated front-end developer with a passion for crafting visually appealing and interactive user experiences. Skilled in HTML, CSS, JavaScript, and modern frameworks like React or Vue.js, I thrive on turning designs into responsive, functional websites and applications. I focus on delivering clean, maintainable code and staying updated with the latest trends in front-end development.', 'india', '677bbb79cdd72_elijah-hiett-umfpFoKxIVg-unsplash.jpg', '$2y$10$2gN8HyI8DIKXci510O8aGOghZjnESK.bQjBCP/M2pb31hGYstd1Ma', '2025-01-04 18:15:46', 'Frontend Developer'),
(7, 'Naresh kumar mahanta', 'nareshkumarmahanta10@gmail.com', '8114624902', 'heiii, i am a smalll photographic boy.', 'india', '6780d2cb1ffce_aaa.jpg', '$2y$10$IOJqfqG4YwR78F6aTMkNNuJTr2r3buqSfRgsiNWdiTSxvs7m.j34i', '2025-01-10 13:20:37', 'Photographer'),
(8, 'knightking', 'knightkingbr46@gmail.com', '7746349821', 'i am a gamedevloper , who devlops verius type of gameing . pasion about about modeling and staright photograpy', 'india', '6782a375244b6_knightking.jpg', '$2y$10$JozN9CB2IvvVEjHtsAHEneFb1rLAZ5/kty8Ljt5MwUcgv1Fylxkbu', '2025-01-11 22:21:37', 'Game developer'),
(10, 'kumar', 'kumar@gmail.com', '8984712930', 'i am a civil enginer who construction some laxury hotel and road and brand laxury mall.', 'india', '6783b4b658f69_kumar.jpg', '$2y$10$xWyDMqm5bmT8YSsNp74NC.f/WuJQKowDSyJbQ3/VOar8zlaE/iIjG', '2025-01-12 16:18:23', 'civil engener'),
(11, 'Ashis', 'ashishkumar@gmail.com', '8984712930', '', '', '67878caa8ba98_construction engering.jpg', '$2y$10$18sL.nQrFGKblZcV7urubu41pBTnzjiaYR34rOG6viQxXBU9jWAg.', '2025-01-15 15:53:06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_tbl`
--
ALTER TABLE `blogs_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_content`
--
ALTER TABLE `team_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs_tbl`
--
ALTER TABLE `blogs_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_content`
--
ALTER TABLE `team_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
