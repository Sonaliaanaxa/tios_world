-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 02:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tios`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `details` longtext NOT NULL,
  `img` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `details`, `img`, `created_at`, `updated_at`) VALUES
(1, 'About MedTo', '<p><strong>MedTo</strong> is a platform that connects patients to healthcare partners. We introduce you to a web platform where you can get yourself diagnosed, book a doctor&rsquo;s appointment, book a bed in hospitals, or can go for a second opinion and the best feature which would surely help you is planning your surgery in advance with us.</p>\r\n\r\n<p><strong>MedTo </strong>is to generate value for its users by providing low-cost healthcare &amp; fitness services from nearby verified service providers.</p>\r\n\r\n<p>The Mission of <strong>MedTo India</strong> is to help improve human health by simplifying healthcare services and providing a platform for better health facilities and spreading happiness through our care.</p>', 'about_1616676486.jpeg', '2021-01-03 18:19:38', '2021-05-25 11:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `askquestions`
--

CREATE TABLE `askquestions` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `looking_for` varchar(100) NOT NULL,
  `detail` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `askquestions`
--

INSERT INTO `askquestions` (`id`, `email`, `phone`, `looking_for`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'patient@gmail.com', '2147483647', 'Just information', 'Heart conditions that include diseased vessels, structural problems and blood clots.', '2021-03-06 09:36:32', '2021-03-06 09:36:32'),
(2, 'dghjj@gmail.com', '2147483647', 'Just information', 'At timeanddate.com we define a time zone as a region where the same standard time is used.', '2021-04-02 11:17:11', '2021-04-02 11:17:11'),
(3, 'rohitsinghrajput6282@gmail.com', '2147483647', 'Treatment details', 'i just want to wha t is the cost appointment', '2021-04-16 06:55:18', '2021-04-16 06:55:18'),
(4, 'dfgf@gmail.com', '345678976', 'Just information', 'Search Doctors', '2021-04-16 08:48:51', '2021-04-16 08:48:51'),
(5, 'dfghj@gmail.com', '345678978', 'Just information', 'Medicine required', '2021-04-16 08:55:00', '2021-04-16 08:55:00'),
(6, 'iit2013063@gmail.com', '09919763885', 'Just information', 'hg', '2021-04-16 10:19:50', '2021-04-16 10:19:50'),
(7, 'munnakumarsah4u@gmail.com', '07352921731', 'Just information', 'ggdgdhgcgjc', '2021-04-17 12:51:30', '2021-04-17 12:51:30'),
(9, 'rohitsinghrajput6282@gmail.com', '9999181009', 'Just information', 'i seen your website it is very gud to see this it is very interesting websites for doctor appointment', '2021-04-23 11:49:59', '2021-04-23 11:49:59'),
(10, 'socialvaidya@gmail.com', '09919763885', 'Just information', 'hi', '2021-05-11 05:08:56', '2021-05-11 05:08:56'),
(11, 'ak@123gmail.com', '870986954', 'Just information', 'hi', '2021-05-20 06:39:48', '2021-05-20 06:39:48'),
(12, 'nknitish407@gmail.com', '9599402171', 'Just information', 'this is test', '2021-06-22 13:06:42', '2021-06-22 13:06:42'),
(13, 'iit2013063@gmail.com', '09919763885', 'Treatment details', 'Just wanna know how can I get rid of typhoid?', '2021-07-04 08:48:37', '2021-07-04 08:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `short_details` longtext NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `user_type`, `user_name`, `blog_title`, `short_details`, `details`, `image`, `created_at`, `updated_at`) VALUES
(5, 1, '', 'Dr. Deborah Angel', 'Benefits of consulting with an Online Doctor', 'As modern medicine allows people to live longer, the demand for doctors is expected to rise. However, thanks to technology.', '<p>As modern medicine allows&nbsp;<strong>people to live longer</strong>, the demand for doctors is expected to rise. However, thanks to technology, there are ways for us to reach our doctor without needing to visit the clinic. With an online consultation from your doctor, you can get the health care you require.</p>\r\n\r\n<p>Are you worried you won&rsquo;t like it? Did you know that&nbsp;<strong>98 percent of patients</strong>&nbsp;who experienced virtual doctor consultations reported approval?</p>\r\n\r\n<p>If you would like to find out more about the 8 benefits of an&nbsp;<strong>online consultation</strong>&nbsp;with your doctor, keep reading below.</p>\r\n\r\n<h2>1. No Need to Travel</h2>\r\n\r\n<p>Every time you go to visit your doctor, you have to travel to get there. With an online consultation, you don&rsquo;t need to wait for the bus or get gas for your car. You simply go on the internet and begin your consultation.</p>\r\n\r\n<p>You can speak with highly trained medical professionals without needing to move from your seat.</p>\r\n\r\n<p>This is especially useful if your condition reduces your mobility. Or, maybe you don&rsquo;t have access to transport. Whatever the reason, you can get the medical assistance you need from the comfort of your home.</p>\r\n\r\n<h2>2. Improved ways to check your symptoms</h2>\r\n\r\n<p>According to reports,<a href=\"http://www.medto.in\">&nbsp;<strong>35 percent of Americans go online</strong></a>&nbsp;to find out what kind of medical condition they have.</p>\r\n\r\n<p>The cat is out of the bag. It&rsquo;s impossible to stop people from searching the internet for a self-diagnosis.</p>\r\n\r\n<p>There are always going to be limitations to reading blogs and watching videos about your symptoms and what they mean. However, with virtual doctors using intelligent symptom checkers, you stand a better chance of&nbsp;<strong>identifying your symptoms&nbsp;</strong>and the causes. Then you are also well prepared to meet your family doctor or have an online doctor consultation.</p>\r\n\r\n<h2>3. Save Your Money</h2>\r\n\r\n<p>Are you thinking, &ldquo;This has got to be really expensive!&rdquo;? That&rsquo;s not true.</p>\r\n\r\n<p>Online doctor consultation is an affordable solution to your medical needs.</p>\r\n\r\n<p>Because it&rsquo;s cheaper to speak with a doctor online, you can afford to see a doctor even if you&rsquo;re not certain.</p>\r\n\r\n<h2>4. Get Your Prescription</h2>\r\n\r\n<p>Do you require regular prescriptions for your health condition?</p>\r\n\r\n<p>You don&rsquo;t need to visit a doctor face-to-face to get your prescription. You can receive the prescription from a nearby pharmacy or directly to your door.</p>\r\n\r\n<p>However, you might require an in-person examination before you can receive your prescription. An example of this is viagra.</p>\r\n\r\n<p>There are often occasions when you can get your prescription with just an online consultation or medical advice with a doctor. In particular, contraceptives and many types of allergy medication can be prescribed by a doctor online.</p>\r\n\r\n<h2>5. Privacy and Security</h2>\r\n\r\n<p>Many people aren&rsquo;t familiar with talking to their doctor online.</p>\r\n\r\n<p>That&rsquo;s why it&rsquo;s especially important to make sure you&rsquo;re talking to someone with the medical expertise to advise you on your health condition.</p>\r\n\r\n<p>With a&nbsp;<a href=\"http://www.medto.in\"><strong>virtual doctor</strong></a>, you can be confident that you&rsquo;re using a secure system and server. Your information will always be kept safe and secure. As always, everything you discuss with your doctor online is confidential.</p>\r\n\r\n<p>Your online doctor will comply with the HIPAA (Health Insurance Portability and Accountability Act), which was passed in 1996. This ensures that your medical data is safe.</p>\r\n\r\n<h2>6. Comfortable and Convenient</h2>\r\n\r\n<p>If you wake up in the middle of the night with symptoms that you&rsquo;re concerned about &ndash; what can you do?</p>\r\n\r\n<p>Normally, you would have to wait until the doctor&rsquo;s clinic opens the next day, or rush to a 24/7 clinic. However, with an online consultation, you can reach your doctor 24/7.</p>\r\n\r\n<p>Do you work full-time? Have you got a really busy schedule?</p>\r\n\r\n<p>You can see your doctor without messing up your schedule. You no longer have to sit in your doctor&rsquo;s waiting room for a consultation. Now, you can sit in the comfort of your own home while you wait to speak to the doctor.</p>\r\n\r\n<h2>7. Learn About Your Own Health</h2>\r\n\r\n<p>Unlike in a face-to-face consultation, in your online consultation with your doctor, you sometimes have to examine yourself.</p>\r\n\r\n<p>For instance, you have to check the inflamed tissue in your throat or the ache in your back. By examing yourself, you can learn a lot about your health condition.</p>\r\n\r\n<p>The greater your understanding of your own medical problems, the better you&rsquo;ll be about determining whether you need to see a doctor.</p>\r\n\r\n<h2>8. No Risk of Infections From the Doctor&rsquo;s Clinic</h2>\r\n\r\n<p>It&rsquo;s a strange idea that you go to the doctor&rsquo;s to get better. After all, you&rsquo;re traveling to a location where lots of people are sick. If you&rsquo;re sitting and waiting for hours for your appointment, you could catch all kinds of diseases.</p>\r\n\r\n<p>With your online consultation, there&rsquo;s no risk of catching anything. If your immune system is down, sometimes you&rsquo;re better speaking to a doctor from the safety of your home.</p>', 'blog-03.jpg', '2021-01-13 16:17:20', '2021-07-19 12:58:31'),
(6, 2, '', 'Dr. Sofia Brient', '5 Great Reasons Using an Online Doctor Will Benefit You', 'When a person suddenly starts to feel ill and needs medical assistance, online consultation serves as the most ideal approach to get instant medical advice.', '<p>When a person suddenly starts to feel ill and&nbsp;<strong>needs medical</strong>&nbsp;assistance,&nbsp;<strong>online consultation</strong>&nbsp;serves as the most ideal approach to get instant&nbsp;<strong>medical advice</strong>. Though not suitable for an urgent or emergency health issue, secure and confidential&nbsp;<strong>online doctor consultations are</strong>&nbsp;available and&nbsp;<strong>are</strong>&nbsp;just a click away.</p>\r\n\r\n<p>Why spend extra energy traveling to the GP when you can speak to a doctor from wherever you are? Here are the top 5 reasons to use an online doctor service.</p>\r\n\r\n<p><a href=\"http://www.medto.in/appointment-book\">BOOK AN ONLINE CONSULTATION NOW</a></p>\r\n\r\n<h2>1. Save time.</h2>\r\n\r\n<p>For many illnesses, there&rsquo;s no need to book an appointment at a busy GP office and account for the time needed to travel there and back. You can login and book a same-day appointment (many online doctors have evening and weekend hours as well).</p>\r\n\r\n<p>Additionally, if you need a prescription urgently, the doctor can fax this directly to a pharmacy and will post a hard copy with their signature.</p>\r\n\r\n<h2>2. Save money.</h2>\r\n\r\n<p>There&rsquo;s no need for medical treatment to break the bank. Fortunately, online doctors are often less expensive than a local GP. This monetary difference is crucial for many people.</p>\r\n\r\n<h2>3. Communicate directly with your doctor.</h2>\r\n\r\n<p>You can message the doctor about your treatment directly through an online portal. This continuous care ensures that you fully understand the treatment your doctor has advised and allows your doctor to easily follow up with you.</p>\r\n\r\n<h2>4. Get a Medical Certificate without having to leave your house</h2>\r\n\r\n<p>You&rsquo;re ill. You don&rsquo;t want to spread your highly contagious flu or cold or winter vomiting bug around the office. So why should you have to even leave your house?</p>\r\n\r\n<p>Speaking to an online doctor about your symptoms can help you get a medical certificate quickly and with little fuss, so you can focus on recovering and getting back to work as soon as you can.</p>\r\n\r\n<h2>5. Referrals managed online, with all of your information in one place.</h2>\r\n\r\n<p>An online doctor can refer you on to a specialist just like any normal GP. The results from the referral would then be returned to the online doctor, who can discuss these with you further if necessary - all online, all easily accessible.</p>\r\n\r\n<p>It is true that an online doctor can&rsquo;t do everything. For instance, if a physical assessment is needed, an online doctor will refer you to your local GP. However, for many basic ailments and injuries, an online doctor can provide an easy, convenient and affordable way to get expert medical advice and treatment.</p>', 'blog-04.jpg', '2021-01-13 16:18:26', '2021-07-19 12:58:02'),
(11, 25, 'doctor', 'Doctor', 'The impact of health information technology on patient safety', 'The benefits of health information technology (IT) include its ability to store and retrieve data; the ability to rapidly communicate patient information in a legible', '<p>The benefits of&nbsp;<strong>health information technology</strong>&nbsp;(IT) include its ability to store and retrieve data; the ability to rapidly communicate&nbsp;<strong>patient information</strong>&nbsp;in a legible format;&nbsp;<strong>improved</strong>&nbsp;medication&nbsp;<strong>safety</strong>&nbsp;through increased legibility, which potentially decreases the risk of medication errors;&nbsp;<strong>Technology</strong>&nbsp;helps contribute to&nbsp;<strong>patient</strong>-centered&nbsp;<strong>care</strong>&nbsp;by fostering communication between providers and&nbsp;<strong>patients</strong>&nbsp;via online portals, text messaging, and email. It also increases access to information such as online medical records, which can improve self-monitoring and&nbsp;<strong>patient</strong>&nbsp;convenience.Health&nbsp;<strong>informatics</strong>&nbsp;can have a significant part in this process. By properly collecting, analyzing and leveraging these numbers, professionals can use data to improve processes, identify at-risk&nbsp;<strong>patients</strong>, enhance efficiency and advance research, all in the pursuit of improved&nbsp;<strong>patient outcomes</strong>.</p>', 'docotr image.jpg', '2021-04-20 18:20:17', '2021-07-19 12:57:25'),
(14, 1, 'admin', 'Admin - Social Vaidya', 'Causes Of Lower Back Pain | Be Aware Of These Reasons | MedTo by Social Vaidya', 'Do you pop a painkiller as and when your back starts aching? If yes, then it\'s time to sit up and take notice.', '<p>Do you pop a painkiller as and when your back starts aching? If yes, then it&#39;s time to sit up and take notice.</p>\r\n\r\n<p>Back pain is a common problem but out of all the types of back pains, lower backache is a common complaint in India. A surprising fact is that 9 in 10 patients do not know the exact cause behind it and wait to see a doctor until it becomes chronic.</p>\r\n\r\n<p>Another fact here is that lower back pain is more common in women&nbsp;than in men. So all the fairer sex out there, know the reason behind your back pain because you are the pillar of your family and backache will not only affect you but also your family.</p>\r\n\r\n<p>So let us have a look at the most common reasons behind back pain:</p>\r\n\r\n<h2><strong>A) Gynecological reasons</strong></h2>\r\n\r\n<h2><strong>1. Pregnancy</strong></h2>\r\n\r\n<p>i) Because of the increase in weight during pregnancy, pressure is put on the back muscles which causes strain leading to lower back pain.</p>\r\n\r\n<p>ii) Change in posture as your bump grows.</p>\r\n\r\n<p><strong><em><strong><em>&ldquo;According to Dr. Aditi Kalra Arya, Physiotherapist and Antenatal Instructor formerly at Apollo Cradle, adopting a wrong posture and gait during pregnancy is the most common cause of low backache in women.&rdquo;</em></strong></em></strong></p>\r\n\r\n<p>iii) The sudden hormonal rush in your body during this time can make the ligaments in the pelvic area to soften, as a result of which the joints become looser leading to low back pain.</p>\r\n\r\n<p>iv) Post-partum depression and increase in workload soon after pregnancy is at home or at the office.</p>\r\n\r\n<h2><strong>2. Premenstrual Syndrome (PMS) and Menstruation</strong></h2>\r\n\r\n<p>Lower back pain caused by PMS and Menstruation isn&rsquo;t dangerous as it&rsquo;s a normal process that occurs in your body every month. But if you experience severe pain that affects your body functioning, it is better to see your gynecologist.</p>\r\n\r\n<h2><strong>3. Endometriosis</strong></h2>\r\n\r\n<p>Endometriosis is a condition in which the lining of the uterus extends outside the uterus and attaches to the ovaries, fallopian tubes, as well as the pelvic area. With a change in hormones during the menstrual cycle, this extended lining breaks down and can cause pain in the lower back.</p>\r\n\r\n<h2><strong>4. Ovarian cyst</strong></h2>\r\n\r\n<p>One of the most prominent symptoms of ovarian cyst is a dull ache in the lower pelvic area. This pain can transmit to the back area and can interfere with daily functioning.</p>\r\n\r\n<h2><br />\r\n<strong>5. Uterine fibroids</strong></h2>\r\n\r\n<p>Uterine fibroids are hard tumors which are composed of fibrous tissue and smooth muscle. It can cause back pain as well as pelvic pain radiating to the lower back, hip, thighs, and buttocks by pressing upon spinal nerves that exit the spine in the lower back.</p>\r\n\r\n<h2><strong>6. Ovarian cancer</strong></h2>\r\n\r\n<p>Ovarian cancer is one of the most serious conditions which is associated with low back pain.</p>\r\n\r\n<h2><strong>B) Structural reasons</strong></h2>\r\n\r\n<h2><strong>1. Degenerative Disc Disease (DDD) or Herniated discs</strong></h2>\r\n\r\n<p>Spinal discs act as a cushion to your vertebrae that make up your spine and in the case of DDD the discs either lose cushioning or slip through a crack of the spine which is known as Herniated discs. This can be really painful.</p>\r\n\r\n<h2><strong>2. Sciatica</strong></h2>\r\n\r\n<p>Due to a herniated disk pressing on the nerve, you might experience a sharp and a shooting pain that radiates through the lower back down the back of your leg. This condition is known as Sciatica. Do not delay and consult your doctor if you continue to feel this excruciating pain.</p>\r\n\r\n<h2><strong>3. Osteoporosis</strong></h2>\r\n\r\n<p>You won&rsquo;t know if you are a victim of osteoporosis but one major symptom which can tell you that you are is- Severe back pain.</p>\r\n\r\n<h2><strong>C) Internal problems</strong></h2>\r\n\r\n<h2><strong>1. Pelvic Inflammatory Disease</strong></h2>\r\n\r\n<p>PID is an infection of the female reproductive organs (the fallopian tubes, uterus, ovaries, vagina, and cervix) and is usually caused by an STI.</p>\r\n\r\n<h2><strong>2. Pancreatitis</strong></h2>\r\n\r\n<p>Pancreatitis is another condition that causes lower back pain in women. Lower back pain in women with pancreatitis typically worsens after consuming food.</p>\r\n\r\n<h2><strong>3. Kidney disease</strong></h2>\r\n\r\n<p>An infection in the kidneys can cause a lot of pain in the lower back, abdomen, and groin.</p>\r\n\r\n<h2><strong>D) Others</strong></h2>\r\n\r\n<h3><strong>1. Obesity</strong></h3>\r\n\r\n<p>If you are obese, extra stress is put on muscles and the discs in the backbone which leads to pain in the lower back.</p>\r\n\r\n<h3><strong>2. Improper posture</strong></h3>\r\n\r\n<p>Your lower back pain can also be the result of some everyday activity or poor posture. Some of the examples of improper posture can be:</p>\r\n\r\n<p>-Sitting in a hunched position in office chairs in front of computers for a long time<br />\r\n-Bending awkwardly or bending down for long periods<br />\r\n-Standing for long periods<br />\r\n-Pushing, pulling, lifting, or carrying something heavy<br />\r\n-Over-stretching or twisting in the gym<br />\r\n-Improper weight lifting<br />\r\n-Coughing or sneezing suddenly with a jerk<br />\r\n-Excess driving every day</p>\r\n\r\n<h3><strong>3. Mommy duties</strong></h3>\r\n\r\n<p>Being a mommy takes a heavy toll on your complete health. Whether you are bending to pick your kid, their toys, bending over dirty dishes to get them clean or running from one room to another in order to feed your child, all can strain the lower back.</p>\r\n\r\n<h3><strong>4. Bad mattress</strong></h3>\r\n\r\n<p>It is equally important to choose the right mattress as a bad mattress can cause and worsen existing back pain. But do remember that your mattress should neither be too firm nor too soft. This is because if your mattress is soft and sinks it won&rsquo;t keep your spine straight, leading to a greater risk of developing lower back pain. And if your mattress is too firm, it won&rsquo;t give the lower back support when you&rsquo;re lying on your back causing backache.</p>\r\n\r\n<h3><strong>5. Sleep disorder</strong></h3>\r\n\r\n<p>Researchers have found that individuals with sleep disorders are more likely to experience low back pain. So try to have a good night sleep or consult your doctor to overcome sleep disorders.</p>\r\n\r\n<h3><strong>6. Lack of vitamin D in diet</strong></h3>\r\n\r\n<p>The diet followed by Indian women is generally low in vitamin D causing weaker bones and lower backaches. Also, today&rsquo;s women tend to spend half of their time working indoors be it at the office or at home, depleting them from vitamin D received naturally from the sun.</p>\r\n\r\n<h3><strong>7. Smoking</strong></h3>\r\n\r\n<p>Do you know that smokers are almost three times more likely to develop low back pain than nonsmokers? Yes, it&rsquo;s true. Studies have said that the nicotine in cigarette smoke thickens the walls of the blood vessels. This restricts the flow of blood through the blood vessels of the lower back and increases the time to recover from existing back pain.</p>\r\n\r\n<p>So what are you waiting for? Find out the precise reason for your lower back pain and get started with the required treatment without delay. Take care!</p>\r\n\r\n<p>&ndash;<a href=\"http://www.socialvaidya.com/\">Dr. Monalisa Deka</a></p>', 'blog_1626591783.jpg', '2021-07-16 00:02:40', '2021-07-19 12:57:07'),
(16, 1, 'admin', 'Admin - Social Vaidya', 'ज्यादा ‘विटामिन सी’ का सेवन बन सकता है – किडनी की पथरी का कारण | जानें क्यों होती है पथरी ?', 'किडनी की पथरी कई कारणों से हो सकती है, जिसमें से एक कारण शरीर में विटामिन सी की ज्यादा मात्रा भी है। आइए आपको बताते हैं क्या है इसका कारण और कैसे करें विटामिन सी का सेवन ताकि शरीर को न हो कोई नुकसान।', '<h2><strong>क्यों होती है पथरी ?</strong></h2>\r\n\r\n<p>किडनी की पथरी कई कारणों से हो सकती है, जिसमें से एक कारण शरीर में विटामिन सी की ज्यादा मात्रा भी है। आइए आपको बताते हैं क्या है इसका कारण और कैसे करें विटामिन सी का सेवन ताकि शरीर को न हो कोई नुकसान।</p>\r\n\r\n<p>विटामिन सी शरीर के लिए जरूरी है मगर ज्यादा मात्रा में इसका सेवन किडनी की पथरी का कारण बन सकता है। खट्टे फल और सब्जियां विटामिन सी का सबसे अच्छा स्रोत माने जाते हैं, जैसे- नींबू, टमाटर, आंवला, संतरा, अंगूर, बेर, स्ट्रॉबेरी, मौसमी आदि। इसके अलावा अन्य आहारों जैसे- आलू, कटहल, शिमला मिर्च, पालक, चुकंदर, धनिया में भी विटामिन सी की मात्रा होती है। ये शरीर के लिए एक जरूरी विटामिन है क्योंकि इससे शरीर की रोग प्रतिरोधक क्षमता बेहतर होती है। मगर ज्यादा मात्रा में इस विटामिन के सेवन से किडनी की पथरी का खतरा होता है।</p>\r\n\r\n<h2><strong>ज्यादा विटामिन सी से किडनी की पथरी क्यों?</strong></h2>\r\n\r\n<p>पथरी आमतौर पर तब होती है जब किडनी में ऑक्जलेट और कैल्शियम जैसे कई तत्व जमा होते-होते एक ठोस कंकड़ जैसे हो जाते हैं। जब आप ऑक्जालेट की अधिक मात्रा वाले खाद्य का सेवन करते हैं तो किडनी स्टोन होने की आशंका बढ़ जाती है।</p>\r\n\r\n<h2><strong>खतरनाक हो सकती हैं विटामिन सी की गोलियां</strong></h2>\r\n\r\n<p>आजकल लोगों में &lsquo;मल्टी विटामिन्स&rsquo; और आयरन की गोलियां लेने का फैशन चल पड़ा है। कई बार लोग बिना डॉक्टर की सलाह के खुद ही विटामिन्स की गोलियां खाने लगते हैं। बिना जरूरत के विटामिन्स आपके शरीर के लिए बहुत नुकसानदायक हो सकते हैं और कई बार जानलेवा भी हो सकते हैं। अगर आप विटामिन सी का ज्यादा सेवन करते हैं, तो आपका शरीर विटामिन बी-12 को कम एब्जॉर्ब कर पाता है। जिसके चलते खून की कमी देखी जाती है। विटामिन सी की गोलियों का अधिक सेवन करने से डी एन ए क्षतिग्रस्त हो सकता है और कैंसर की संभावना भी उत्पन्न हो सकती है।</p>\r\n\r\n<h2><strong>कैसे बच सकते हैं पथरी से</strong></h2>\r\n\r\n<p>विटामिन सी शरीर के लिए जरूरी तत्व है इसलिए इसका सेवन जरूर करें। अगर आप संतुलित भारतीय खाना जैसे- दाल, चावल, दही, छाछ, सलाद, रायता, अचार, फल और हरी सब्जियां आदि लेते हैं, तो इन्हीं से आपके शरीर के लिए सभी जरूरी पोषक तत्व मिल जाएंगे। इसलिए कभी भी बिना डॉक्टर की सलाह के विटामिन की गोलियां न खाएं। विटामिन्स की गोलियों की जरूरत शरीर को तब होती है, जब डॉक्टर जांच के द्वारा आपके शरीर में इनकी कमी पाता है।</p>\r\n\r\n<p>अगर आप जरूरत से ज्यादा विटामिन सी का सेवन करते हैं, तो आपको किडनी की पथरी की शिकायत हो सकती है। दरअसल विटामिन सी शरीर में जाकर ऑग्जलेट में बदल जाता है। शरीर में मौजूद इस ऑग्जलेट को हमारी किडनियां पेशाब के रास्ते से बाहर निकाल देती हैं। लेकिन जब आप ज्यादा विटामिन सी का सेवन कर लेते हैं, तो शरीर में ज्यादा मात्रा में ऑक्जलेट बनता है। ये सभी ऑक्जलेट पेशाब के रास्ते से बाहर नहीं निकल पाता और किडनी में ही किसी जगह जमा होने लगता है। धीरे-धीरे यही ऑग्जलेट जब जमा होते-होते कंकड़ के आकार का हो जाता है, तो पथरी के रूप में परेशानी देने लगता है।</p>\r\n\r\n<h2><strong>इन आहारों का भी ज्यादा न करें सेवन</strong></h2>\r\n\r\n<p>चाय, कॉफी, पालक, नट्स और एरेटेड ड्रिंक, ऑक्जालेटेड फूड्स, ज्यादा नमक वाले फूड्स जैसे अचार, मैरिनेड किया भोजन स्टोन का कारण बन सकते हैं। इसके अलावा सी-फूड और टेबल सॉल्टेड रेड मीट में यूरिक एसिड उच्च मात्रा में होता है जोकि पथरी का कारण बन सकता है। इसके अलावा कम मात्रा में पानी पीने से से भी स्टोन होने की आशंका बढ़ती है।</p>', 'blog_1626590831.jpg', '2021-07-16 12:02:50', '2021-07-19 12:56:40'),
(22, 1, 'admin', 'Admin - Social Vaidya', 'How Outdoor Exercise & Fresh Air Impact Health', 'It’s no secret that exercise is an important part of life, especially for adults who often sit behind a desk all day.', '<p>Outdoor exercise offers an alternative to gyms &mdash; which can be intimidating, and are likely closed during times of social distancing! Sports such as hiking, canoeing, swimming, biking, and numerous other outdoor activities give you more choices for enjoyable exercise, which is likely to keep you motivated. They can also be done on your own, so you can do them safely.</p>\r\n\r\n<h4>THE BENEFITS OF BEING OUTDOORS:</h4>\r\n\r\n<ul>\r\n	<li><strong>Fresh air is good for your health.&nbsp;</strong>Fresh air has been shown to help digest food more effectively, improve blood pressure and heart rate, strengthen the immune system, reduce obesity rates, and strengthen family ties, all leading to a healthier you.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>It makes you happier.</strong>&nbsp;According to research, positive emotions can be correlated to a person&rsquo;s long-term health habits which reduce the risk of future heart problems &ndash; a leading cause of death in the United States. &ldquo;Higher levels of positive emotions were associated with less smoking, greater physical activity, better sleep quality and more adherence to medications at baseline,&rdquo; claims researcher, Nancy L Sim</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Fresh air cleans your lungs.</strong>&nbsp;&ldquo;Fresh air helps the airways of your lungs to dilate more fully and improves the cleansing action of your lungs,&rdquo; says Seepter. &ldquo;When you exhale and breathe out through your lungs, you release airborne toxins from your body.&rdquo;</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>You will have more energy and sharper mind.</strong>&nbsp;Research shows that &ldquo;spending time in fresh air, surrounded by nature, increases energy in 90 percent of people,&rdquo; says Abigail Wise,&nbsp;<em>The Huffington Post</em>. There is a &ldquo;positive impact of being outdoors and around natural elements on subjective vitality, above and beyond the effects of physical activities or social interactions that can take place in natural settings,&rdquo; adds researcher Richard Ryan, et al.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Outdoor Exercise is Adaptable</strong>&nbsp;Best of all, outdoor exercise can be adapted to anyone no matter their level of fitness.</li>\r\n</ul>\r\n\r\n<p><em>&ldquo;Nature is fuel for the soul, often when we feel depleted we reach for a cup of coffee, but research suggests a better way to get energized is to connect with nature.&rdquo;</em></p>\r\n\r\n<p><strong>&ndash; Richard Ryan, researcher and professor of psychology at the University of Rochester.</strong></p>', 'blog_1626436253.png', '2021-07-16 18:50:53', '2021-07-16 19:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank_requests`
--

CREATE TABLE `bloodbank_requests` (
  `id` int(100) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `height` double DEFAULT NULL,
  `hunit` varchar(100) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `wunit` varchar(100) DEFAULT NULL,
  `user_type` enum('request','donate') NOT NULL DEFAULT 'request',
  `blood_group` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `appoint_date` date NOT NULL,
  `address` longtext DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `status` enum('completed','pending') NOT NULL DEFAULT 'pending',
  `bank_id` int(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_email` varchar(100) DEFAULT NULL,
  `bank_mobile` varchar(15) DEFAULT NULL,
  `bank_address` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodbank_requests`
--

INSERT INTO `bloodbank_requests` (`id`, `order_no`, `name`, `email`, `mobile_no`, `age`, `height`, `hunit`, `weight`, `wunit`, `user_type`, `blood_group`, `gender`, `appoint_date`, `address`, `img`, `status`, `bank_id`, `bank_name`, `bank_email`, `bank_mobile`, `bank_address`, `created_at`, `updated_at`) VALUES
(22, 'MED117911126', 'Rohit singh', 'rohitsinghrajput6282@gmail.com', '9999181009', 22, 5.6, 'ft', 66, 'kg', 'request', 'O-', 'male', '2021-04-13', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'bloodbank_1618290672.jpg', 'pending', 26, 'Blood Bank', 'bloodbank@gmail.com', '677889676', 'D-56,sector-56,Noida,UP,india', '2021-04-13 12:11:12', '2021-04-13 12:11:12'),
(23, 'MED115594032', 'Vendor shop', 'patient@gmail.com', '09999181009', 23, 5.8, 'ft', 78, 'kg', 'request', 'O+', 'male', '2021-04-23', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'bloodbank_1618306022.jpg', 'pending', 39, 'Rylon', 'rylon@gmail.com', '67895437', 'Mygt N-78,new Delhi, India', '2021-04-13 16:27:02', '2021-04-13 16:27:02'),
(25, 'MED106242539', 'Rohit singh', 'rohitsinghrajput6282@gmail.com', '9999181009', 22, 5.7, 'ft', 78, 'kg', 'request', 'B-', 'male', '2021-04-25', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'bloodbank_1618815371.png', 'pending', 26, 'Blood Bank', 'bloodbank@gmail.com', '677889676', 'D-56,sector-56,Noida,UP,india', '2021-04-19 13:56:11', '2021-04-19 13:56:11'),
(28, 'MED107920768', 'Ranjan', 'rohitsinghrajput6282@gmail.com', '9999181009', 33, 5.8, 'ft', 76, 'kg', 'request', 'B-', 'male', '2021-04-30', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'bloodbank_1619179093.jpg', 'pending', 26, 'Blood Bank', 'bloodbank@gmail.com', '677889676', 'D-56,sector-56,Noida,UP,india', '2021-04-23 18:58:13', '2021-04-23 18:58:13'),
(29, 'MED117147442', 'Rohit singh', 'rohitsinghrajput6282@gmail.com', '9999181009', 22, 5.6, 'ft', 76, 'kg', 'request', 'AB+', 'male', '2021-04-30', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'bloodbank_1619614258.jpg', 'pending', 26, 'Blood Bank', 'bloodbank@gmail.com', '677889676', 'D-56,sector-56,Noida,UP,india', '2021-04-28 19:50:58', '2021-04-28 19:50:58'),
(30, 'MED100973959', 'Prateek Sood', 'satyammegamart@gmail.com', '09459459000', 28, 156, 'cm', 56, 'kg', 'request', 'B+', 'male', '2021-05-14', 'House No.78, Civil Station, Ward No. 10, Depot Bazar, Dharamshala, Kangra, Himachal Pradesh, 176215', 'bloodbank_1620387664.jpg', 'pending', 26, 'Blood Bank', 'bloodbank@gmail.com', '677889676', 'D-56,sector-56,Noida,UP,india', '2021-05-07 18:41:04', '2021-05-07 18:41:04'),
(33, 'MED113528684', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', NULL, NULL, NULL, NULL, NULL, 'request', 'A+', 'male', '2021-05-21', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', NULL, 'pending', 97, 'Raj', 'raj@123gmail.com', '8709856484', NULL, '2021-05-21 14:39:29', '2021-05-21 14:39:29'),
(34, 'MED114452496', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', NULL, NULL, NULL, NULL, NULL, 'request', 'O+', 'male', '2021-06-03', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', NULL, 'pending', 97, 'Raj', 'raj@123gmail.com', '8709856484', NULL, '2021-06-02 16:23:12', '2021-06-02 16:23:12'),
(35, 'MED119623144', 'Abhinav Baghel', 'abhinav.baghel@aanaxagorasr.in', '08766369314', 28, 156, 'cm', 56, 'kg', 'request', 'O+', 'male', '2021-06-24', 'G-130, Ground Floor, Sector 63, Noida', NULL, 'pending', 40, 'Wyni Slipo', 'Wyniwe@gmail.com', '676878999', 'Gtyu N-98,new Delhi, India', '2021-06-22 20:08:14', '2021-06-22 20:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `book_appoint`
--

CREATE TABLE `book_appoint` (
  `id` int(255) NOT NULL,
  `doctorId` varchar(255) NOT NULL,
  `patientId` varchar(100) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_appoint`
--

INSERT INTO `book_appoint` (`id`, `doctorId`, `patientId`, `user_type`, `name`, `email`, `phone`, `purpose`, `date`, `day`, `time`, `fees`, `address`, `comment`, `status`) VALUES
(98, '25', '59', 'patient', 'jkjhjk', 'jhkj@khkjh.kjhg', '8978675645', '0', '2021-05-10', 'monday', '23:35-12:35', '600', 'hjg', 'jhg', 0),
(99, '25', '59', 'patient', 'thtru', 'ghgf@ghg.jghk', '9878767564', '1', '2021-05-17', 'monday', '17:18-18:14', '600', 'ewere', 'tret', 0),
(100, '25', '59', 'patient', 'uyui', 'huyu@ftrt.utyr', '9878675645', '1', '2021-05-17', 'monday', '17:18-18:14', '600', 'uiyi', 'jhugy', 0),
(103, '25', '59', 'patient', 'Afh', 'hj@gmail.com', '67889', '0', '2021-05-27', 'thursday', '02:27-03:32', '600', 'ghjj', 'hjj', 0),
(104, '25', '46', 'patient', 'rajnja', 'rohitsinghrajput6282@gmail.com', '9999181009', '0', '2021-05-27', 'thursday', '02:27-03:32', '600', 'A-82,2 Harsh vihar', 'hlo we need consul', 0),
(105, '25', '59', 'patient', 'hkjhjlk', 'sshailendra1211@gmail.com', '9319442860', '0', '2021-05-27', 'thursday', '02:27-03:32', '600', 'jhkk', 'hjkhkjh', 0),
(106, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '1', '2021-05-31', 'monday', '09:00-18:00', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0),
(107, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '1', '2021-06-02', 'wednesday', '09:19-18:19', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0),
(108, '25', '59', 'patient', 'MUNNA KUMAR SAH', 'munnakumarsah4u@gmail.com', '07352921731', '1', '2021-06-04', 'friday', '09:20-18:15', '600', 'Vill-Repura, Post-Ziradei, Dist-Siwan', 'hi', 0),
(109, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '1', '2021-06-04', 'friday', '09:20-18:15', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0),
(110, '25', '59', 'patient', 'manu', 'manu@gamil.com', '8005414467', '0', '2021-06-04', 'friday', '09:20-18:15', '600', 'hjh', 'hkjkh', 0),
(111, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '1', '2021-06-04', 'friday', '09:20-18:15', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0),
(112, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', NULL, 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(113, '25', '59', 'patient', 'User', 'user@gmail.com', '4567788899', '0', NULL, 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(114, '25', '59', 'patient', 'User', 'user@gmail.com', '4567788899', '0', '2021-06-25', 'friday', '10:00-11:00', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(115, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '1', '2021-06-22', 'tuesday', '09:18-18:00', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0),
(116, '25', '59', 'patient', 'Test', 'anuj.haridwar@gmail.com', '9540834488', '1', '2021-06-23', 'wednesday', '03:31-04:31', '600', 'sdfdsf', 'sfsdf', 0),
(117, '25', '53', 'patient', 'Vir Narayan Das', 'nitish@aanaxagorasr.in', '7479825862', '0', '2021-06-23', 'wednesday', '19:24-20:24', '600', 'At Mirjapur Dastola Po Pawai Ps Korha Dist Katihar', 'test', 0),
(118, '25', '53', 'patient', 'Vir Narayan Das', 'nitish@aanaxagorasr.in', '7479825862', '1', '2021-06-23', 'wednesday', '19:24-20:24', '600', 'At Mirjapur Dastola Po Pawai Ps Korha Dist Katihar', 'test', 0),
(119, '25', '53', 'patient', 'Vir Narayan Das', 'abhinav.baghel@aanaxagorasr.in', '7479825862', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'At Mirjapur Dastola Po Pawai Ps Korha Dist Katihar', 'test', 0),
(120, '25', '53', 'patient', 'Vir Narayan Das', 'abhinav.baghel@aanaxagorasr.in', '7479825862', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'At Mirjapur Dastola Po Pawai Ps Korha Dist Katihar', 'test', 0),
(121, '25', '53', 'patient', 'Vir Narayan Das', 'abhinav.baghel@aanaxagorasr.in', '7479825862', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'At Mirjapur Dastola Po Pawai Ps Korha Dist Katihar', 'test', 0),
(122, '25', '53', 'patient', 'Vir Narayan Das', 'abhinav.baghel@aanaxagorasr.in', '7479825862', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'At Mirjapur Dastola Po Pawai Ps Korha Dist Katihar', 'test', 0),
(123, '25', '53', 'patient', 'Abhinav Baghel', 'abhinav.baghel@aanaxagorasr.in', '08766369314', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(124, '25', '53', 'patient', 'Abhinav Baghel', 'abhinav.baghel@aanaxagorasr.in', '08766369314', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(125, '28', '53', 'patient', 'Abhinav Baghel', 'abhinav.baghel@aanaxagorasr.in', '08766369314', '0', '2021-06-28', 'monday', '15:06-15:06', '500', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(126, '25', '53', 'patient', 'Nitty', 'nitish@aanaxagorasr.in', '9599402171', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(127, '25', '53', 'patient', 'Nitty', 'nitish@aanaxagorasr.in', '9599402171', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(128, '25', '59', 'patient', 'Ddghy', 'restaurant@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(129, '25', '59', 'patient', 'Restaurant', 'restaurant@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(130, '25', '59', 'patient', 'Restaurant', 'restaurant@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(131, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-25', 'friday', '09:20-18:15', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(132, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(133, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(134, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(135, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(137, '25', '59', 'patient', 'Restaurant', 'restaurant@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(138, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-25', 'friday', '09:20-18:15', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(139, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(140, '25', '53', 'patient', 'Prateek Sood', 'satyammegamart@gmail.com', '09459459000', '0', '2021-06-25', 'friday', '02:30-03:30', '600', 'House No.78, Civil Station, Ward No. 10, Depot Bazar, Dharamshala, Kangra, Himachal Pradesh, 176215', 'test', 0),
(141, '25', '53', 'patient', 'Abhinav Baghel', 'abhinav.baghel@aanaxagorasr.in', '08766369314', '0', '2021-06-25', 'friday', '09:20-18:15', '600', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(142, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(143, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(144, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(145, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(146, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 1),
(147, '25', '59', 'patient', 'Red Restaurant', 'restau67@gmail.com', '4567788899', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(148, '25', '59', 'patient', 'Red Restaurant16', 'restau67@gmail.com', '4567788899', '0', '2021-06-26', 'saturday', '02:34-03:36', '600', 'B-56,sector-56,Noida,UP,india', 'gekkl', 0),
(149, '25', '53', 'patient', 'Abhinav Baghel', 'abhinav.baghel@aanaxagorasr.in', '08766369314', '0', '2021-06-24', 'thursday', '04:29-05:29', '600', 'G-130, Ground Floor, Sector 63, Noida', 'test', 0),
(150, '25', '51', 'patient', 'Lalit', 'lalitraghav457@gmail.com', '7827820996', '0', '2021-06-23', 'wednesday', '09:19-18:19', '600', 'H-457, Govind Puram Ghaziabad', 'hello  I  lalit Raghav', 0),
(152, '125', '126', 'patient', 'Nitish', 'nk@gmail.com', '9599402172', '1', '2021-06-28', 'monday', '12:00-14:00', '1', 'G-130', 'test', 0),
(153, '124', '126', 'patient', 'Nitish', 'nk@gmail.com', '9599402172', '1', '2021-06-28', 'monday', '09:30-10:00', '1', 'G-130', 'test', 0),
(154, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '0', '2021-07-02', 'friday', '02:30-03:30', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0),
(155, '25', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '0', '2021-07-16', 'friday', '10:00-11:00', '600', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'j', 0),
(156, '129', '59', 'patient', 'Deepak Kumar Sah', 'iit2013063@gmail.com', '09919763885', '0', '2021-07-21', 'wednesday', '09:00-18:00', '300', 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'hi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Sonata11', 'brands_1640105465.png', '2021-12-21 16:51:05', '2021-12-21 16:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `business_partners`
--

CREATE TABLE `business_partners` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `BusinessPartnerNo` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_partners`
--

INSERT INTO `business_partners` (`id`, `name`, `img`, `link`, `BusinessPartnerNo`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', 'businesspartners_1615286853.jpg', 'doctors/doctor', NULL, '2021-03-08 07:15:20', '2021-06-02 12:10:26'),
(2, 'Blood Bank', 'businesspartners_1615286754.jpg', 'blood-bank', NULL, '2021-03-08 07:21:38', '2021-06-17 10:19:21'),
(3, 'Diagnostic', 'businesspartners_1615286667.jpg', 'doctors/diagnostic', NULL, '2021-03-08 07:22:19', '2021-03-19 09:18:44'),
(4, 'Hospital', 'businesspartners_1615286570.jpg', 'doctors/Hospital', NULL, '2021-03-08 07:22:51', '2021-03-19 09:18:19'),
(5, 'Pharmacy', 'businesspartners_1615286505.jpg', 'category', NULL, '2021-03-08 07:23:22', '2021-03-19 09:04:11'),
(6, 'Patient', 'businesspartners_1615286409.png', 'home', NULL, '2021-03-08 07:23:45', '2021-07-18 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(24, 1, 'First Category1', '', '2021-12-21 16:20:18', '2021-12-22 08:15:21'),
(25, 1, 'First Category', '', '2021-12-21 16:20:18', '2021-12-22 08:15:09'),
(26, 1, 'New Category', '', '2021-12-22 07:07:11', '2021-12-22 07:17:04'),
(27, 1, 'Second Category1', '', '2021-12-22 07:16:03', '2021-12-23 06:03:48'),
(28, 1, 'new', 'new-cat', '2021-12-22 12:32:42', '2021-12-23 06:04:41'),
(29, 1, 'aaa', 'newww', '2021-12-23 05:56:33', '2021-12-23 06:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `typeId` varchar(255) DEFAULT NULL,
  `userId` int(255) DEFAULT NULL,
  `review_id` varchar(255) NOT NULL,
  `bid` varchar(255) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `typeId`, `userId`, `review_id`, `bid`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 'blog', 12, '', NULL, 'kdk', 1, '2021-02-19 10:51:22', '2021-02-20 00:51:22'),
(2, 'blog', 12, '', NULL, 'xyz', 1, '2021-02-19 11:44:28', '2021-02-20 01:44:28'),
(6, 'review', 15, '16', NULL, 'hjghjg', 1, '2021-02-24 08:06:08', '2021-02-24 09:36:08'),
(5, 'review', 15, '20', NULL, 'nnbn', 1, '2021-02-24 08:00:16', '2021-02-24 09:30:16'),
(7, 'blog', 31, '', NULL, 'fsdfg', 1, '0000-00-00 00:00:00', '2021-03-05 13:00:36'),
(8, 'blog', 28, '', NULL, 'kjljjkh', 1, '0000-00-00 00:00:00', '2021-03-26 11:55:17'),
(9, 'blog', 28, '', NULL, 'jhkhjh', 1, '0000-00-00 00:00:00', '2021-03-26 11:55:31'),
(10, 'blog', 30, '', NULL, 'shailendra', 1, '0000-00-00 00:00:00', '2021-03-26 11:56:46'),
(11, 'blog', 30, '', NULL, 'how are mam', 1, '0000-00-00 00:00:00', '2021-04-10 20:33:15'),
(12, 'blog', 30, '', NULL, 'how are you mamm', 1, '0000-00-00 00:00:00', '2021-04-10 20:33:38'),
(13, 'blog', 30, '', NULL, 'gffdgdgfdgg hlo how are mam', 1, '0000-00-00 00:00:00', '2021-04-10 20:34:54'),
(14, 'blog', 30, '', NULL, 'helooi whatsu', 1, '0000-00-00 00:00:00', '2021-04-13 19:52:21'),
(15, 'blog', 30, '', NULL, 'hlo how are u', 1, '0000-00-00 00:00:00', '2021-04-13 19:52:52'),
(16, 'blog', 51, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-13 20:25:35'),
(17, 'blog', 56, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-14 23:42:48'),
(18, 'blog', 56, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-14 23:42:57'),
(19, 'blog', 56, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-14 23:42:58'),
(20, 'blog', 56, '', NULL, 'This is Deepak Anand from Social Vaidya Healthcare.', 1, '0000-00-00 00:00:00', '2021-04-14 23:43:40'),
(21, 'blog', 56, '', NULL, NULL, 1, '0000-00-00 00:00:00', '2021-04-14 23:43:41'),
(22, 'blog', 56, '', NULL, NULL, 1, '0000-00-00 00:00:00', '2021-04-14 23:43:41'),
(23, 'blog', 57, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-16 15:50:18'),
(24, 'blog', 57, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-16 15:50:56'),
(25, 'blog', 57, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-16 15:50:56'),
(26, 'blog', 57, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-16 15:50:56'),
(27, 'blog', 57, '', NULL, NULL, 1, '0000-00-00 00:00:00', '2021-04-16 15:50:57'),
(28, 'blog', 57, '', NULL, NULL, 1, '0000-00-00 00:00:00', '2021-04-16 15:50:58'),
(29, 'blog', 57, '', NULL, 'hi', 1, '0000-00-00 00:00:00', '2021-04-16 16:49:10'),
(30, 'blog', 59, '', NULL, 'Hello', 1, '0000-00-00 00:00:00', '2021-04-20 12:14:29'),
(31, 'blog', 59, '', NULL, 'ghjfg', 1, '0000-00-00 00:00:00', '2021-04-20 12:14:46'),
(32, 'blog', 59, '', NULL, NULL, 1, '0000-00-00 00:00:00', '2021-04-20 12:14:47'),
(33, 'blog', 59, '', NULL, NULL, 1, '0000-00-00 00:00:00', '2021-04-20 12:14:49'),
(34, 'blog', 59, '', NULL, 'jkhj', 1, '0000-00-00 00:00:00', '2021-04-20 12:52:13'),
(35, 'blog', 59, '', NULL, 'utyt', 1, '0000-00-00 00:00:00', '2021-04-20 12:52:17'),
(36, 'blog', 59, '', NULL, 'hukh', 1, '0000-00-00 00:00:00', '2021-04-20 12:54:27'),
(37, 'blog', 59, '', NULL, 'hukh', 1, '0000-00-00 00:00:00', '2021-04-20 12:55:03'),
(38, 'blog', 59, '', NULL, 'uiyu', 1, '0000-00-00 00:00:00', '2021-04-20 12:56:26'),
(39, 'blog', 59, '', '10', 'uuuu', 1, '0000-00-00 00:00:00', '2021-04-20 13:20:13'),
(40, 'blog', 59, '', '10', 'hyuyu', 1, '0000-00-00 00:00:00', '2021-04-20 13:27:05'),
(41, 'blog', 59, '', '10', 'hkhj', 1, '0000-00-00 00:00:00', '2021-04-20 13:29:07'),
(42, 'blog', 59, '', '9', 'hlo it checking purpose text comment', 1, '0000-00-00 00:00:00', '2021-04-20 13:48:05'),
(43, 'blog', 1, '', '9', 'hlo sir', 1, '0000-00-00 00:00:00', '2021-04-20 14:02:03'),
(44, 'blog', 25, '', '10', 'hlo sir whatsup', 1, '0000-00-00 00:00:00', '2021-04-20 14:10:02'),
(45, 'blog', 1, '', '11', 'Nice matters it is the best blog', 1, '0000-00-00 00:00:00', '2021-04-20 18:26:55'),
(46, 'blog', 59, '', '11', 'ya it is gud initate', 1, '0000-00-00 00:00:00', '2021-04-23 17:42:43'),
(47, 'blog', 59, '', '11', 'ok.', 1, '0000-00-00 00:00:00', '2021-04-26 11:31:10'),
(48, 'blog', 59, '', '12', 'hlo how are you', 1, '0000-00-00 00:00:00', '2021-04-28 16:57:18'),
(49, 'blog', 72, '', '10', 'kj', 1, '0000-00-00 00:00:00', '2021-05-02 16:45:46'),
(50, 'blog', 53, '', '10', 'test', 1, '0000-00-00 00:00:00', '2021-05-07 18:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctorprofiles`
--

CREATE TABLE `doctorprofiles` (
  `id` int(255) NOT NULL,
  `userid` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `doctor_image` varchar(500) DEFAULT 'dummy.jpg',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `clinic_name` varchar(255) DEFAULT NULL,
  `clinic_address` varchar(500) DEFAULT NULL,
  `clinic_image` varchar(500) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `upi_id` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `promocode` varchar(255) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `degree1` varchar(255) DEFAULT NULL,
  `college1` varchar(255) DEFAULT NULL,
  `year1` varchar(255) DEFAULT NULL,
  `degree2` varchar(255) DEFAULT NULL,
  `college2` varchar(255) DEFAULT NULL,
  `year2` varchar(255) DEFAULT NULL,
  `degree3` varchar(255) DEFAULT NULL,
  `college3` varchar(255) DEFAULT NULL,
  `year3` varchar(255) DEFAULT NULL,
  `hospital_name1` varchar(255) DEFAULT NULL,
  `from1` date DEFAULT NULL,
  `to1` date DEFAULT NULL,
  `designation1` varchar(255) DEFAULT NULL,
  `hospital_name2` varchar(255) DEFAULT NULL,
  `from2` date DEFAULT NULL,
  `to2` date DEFAULT NULL,
  `designation2` varchar(255) DEFAULT NULL,
  `award1` varchar(255) DEFAULT NULL,
  `award_year` varchar(255) DEFAULT NULL,
  `membership` varchar(255) DEFAULT NULL,
  `likes` int(100) NOT NULL,
  `dislikes` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorprofiles`
--

INSERT INTO `doctorprofiles` (`id`, `userid`, `email`, `phone`, `name`, `status`, `doctor_image`, `first_name`, `last_name`, `gender`, `dob`, `bio`, `clinic_name`, `clinic_address`, `clinic_image`, `account_holder_name`, `account_number`, `ifsc`, `upi_id`, `address`, `city`, `state`, `country`, `postal_code`, `price`, `promocode`, `services`, `specialist`, `degree1`, `college1`, `year1`, `degree2`, `college2`, `year2`, `degree3`, `college3`, `year3`, `hospital_name1`, `from1`, `to1`, `designation1`, `hospital_name2`, `from2`, `to2`, `designation2`, `award1`, `award_year`, `membership`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(1, 1, 'anshu@gmail.com', '7879879765', 'Doctor Anshu', 1, 'doctor-thumb-01.jpg', 'Anshudhar', 'Mishra', 'Male', '1996-01-23', 'Testing', 'Anshu Clinic', 'Ghaziabad', 'doctor-thumb-08.jpg', 'Anshu', '1213231231232', 'ICICI1221', 'ANSHU@YBL', 'Kanpur', 'kakadeo', 'up', 'India', '2010232', '5000', 'SADSAD', 'Treatment', 'Dentist', 'MD', 'PSIT', '2016', 'MBBS', 'KIET', '2019', NULL, NULL, NULL, 'SJM', '2021-01-30', '2021-01-30', 'Doctor', NULL, NULL, NULL, NULL, 'IFFA', '2016', 'Gold', 7, 5, '2021-01-09 10:55:51', '2021-03-04 07:05:03'),
(3, 3, 'chitra@gmail.com', '09988998877', 'Dr Chitra Singh', 1, 'doctor-thumb-02.jpg', 'Chitra', 'Singh', 'Female', '1996-01-25', 'testing', 'Chitra Clinic', 'Varanasi', 'doctor-thumb-03.jpg', 'Chitra Singh', '6070809009808070605', 'ICICI12909', 'chitra@ybl', 'G-130 , G-Block , Sector-63', 'Noida', 'Uttar Pradesh', 'India', '2010009', '500', 'SADSAD', 'Treatment', 'Cardiologist', 'MD', 'KJMU', '2018', 'MBBS', 'PSIT', '2016', 'INTERCOLLEGE', 'DAV', '2012', 'SJM', '2018-01-01', '2020-01-01', 'Doctor', 'NA', NULL, NULL, 'NA', 'NA', 'NA', 'NA', 2, 1, '2021-01-22 06:25:02', '2021-03-03 14:34:59'),
(4, 4, 'anantraj@gmail.com', '09088098877', 'Dr Anant Raj', 1, 'doctor-thumb-03.jpg', 'Anant', 'Raj Singh', 'Male', '1997-08-20', 'Test', 'Anant Clinic Center', 'Siwan', 'doctor-thumb-03.jpg', 'Anant Raj', '7080900605043', 'BARBO0101', 'anant@ybl', 'A250,A-Block,Sector-420', 'Siwan', 'Bihar', 'India', '2010898', '250', 'HRX201', 'Online Consultation , Home Visit', 'Healthcare', 'MD', 'OXFORD UNIVERSITY', '2018', 'MBBS', 'AIIMS', '2016', 'INTERCOLLEGE', 'DELHI PUBLIC SCHOOL', '2012', 'DELHI MEDICAL COLLEGE', '2020-04-01', '2021-01-15', 'Doctor', 'NA', NULL, NULL, 'NA', 'PADMAVUSHAN', '2018', 'PRIMIUM', 0, 0, '2021-01-22 06:37:56', '2021-01-22 20:37:56'),
(8, 38, 'jukrg56@gmail.com', '56778996', 'Dr. Jukrg', 1, 'profile_img_1615790170.jpg', 'Dr. Jukrg', NULL, NULL, NULL, 'I am Doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B-56,sector-56,Noida,UP,india', 'Noida', 'UP', 'Australia', '5667', '670', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-03-18 18:04:13'),
(9, 31, 'slika@gmail.com', '567788845', 'Dr. Slika', 1, 'profile_img_1616145932.jpg', 'Dr. Slika', NULL, NULL, NULL, 'i am doctor', 'Robr Hospital', 'new delhi', NULL, NULL, NULL, NULL, NULL, 'Noida , Delhi ,India', 'noida', 'up', 'India', '6788', '500', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '5678', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-03-18 18:04:13'),
(10, 25, 'doctor@gmail.com', '4567884567', 'Doctor', 1, 'profile_img_1617175165.jpg', 'Doctor', NULL, 'male', '1986-06-20', 'I am Doctor', 'Robr Hospital', 'D-56,Sector-78,Noida,UP,India', 'hos_img1_1617777667.jpg', 'Doctor', '45677783', 'STU45566', '56778', 'B-56,sector-56,Noida,UP,india', 'Noida', 'UP', 'India', '5667', '600', NULL, 'All type treatment', '[\"Orthopedic\",\"Cardiologist\",\"Dentist\"]', 'Master', 'Aline Collage', '2018', '', '', '', '', '', '', 'India Hospital', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-03-18 18:04:13'),
(11, 45, 'swfgt45@gmai.com', '5678899909', 'Dr Stwnt', 1, 'profile_img_1617786224.jpg', 'Dr Stwnt', NULL, NULL, NULL, 'I am Doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B-56,sector-56,Noida,UP,india', 'Noida', 'UP', 'India', '5667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-07 16:51:53'),
(12, 48, 'iit2013063@gmail.com', '9919763885', 'Deepak Kumar Sah', 1, 'profile_img_1627134153.png', 'Deepak Kumar Sah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-13 12:29:41'),
(13, 49, 'amita1aanaxagorasr@gmail.com', '9773669336', 'Ameeta', 1, 'profile_img_1618555853.jpg', 'Ameeta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-13 14:35:50'),
(14, 52, 'wronk@gmail.com', '456788999', 'Wronk', 1, 'dummy.jpg', 'Wronk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-13 17:40:29'),
(15, 55, 'rohit@aanaxagorasr.com', '9999181009', 'ranjna', 1, 'profile_img_1618393478.jpg', 'ranjna', NULL, 'male', '1997-11-19', 'i m sincere doctor', 'Jevanjyoti', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', NULL, 'ranjana', '2147483647', 'e2we2', 'ewdd34WQE', 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', '110044', '300', NULL, 'Operation', 'Orthopedic', 'MBBS', 'Niet', '2019', '', '', '', '', '', '', '2012', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-14 16:36:49'),
(16, 56, 'deepak@gmail.com', '9919763885', 'Deepak Kumar Sah', 1, NULL, 'Deepak Kumar Sah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-14 23:30:07'),
(17, 62, 'nikkynavvya24@gmail.com', '8287146769', 'stom', 1, 'dummy.jpg', 'stom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-23 20:08:08'),
(18, 61, 'nikkynavvya24@gmail.com', '8377905650', 'stom', 1, 'dummy.jpg', 'stom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-04-23 20:08:08'),
(19, 95, 'ak@123gmail.com', '9863598608', 'Aryan', 1, NULL, 'Aryan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-05-20 13:09:07'),
(20, 99, 'sshailendra@gmail.com', '9319442860', 'manu', 1, 'profile_img_1621504435.jpeg', 'manu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-05-20 16:53:57'),
(21, 100, 'dok@gmail.com', '8051565392', 'Dr K. Kumar', 1, 'profile_img_1626589370.jpg', 'Dr K. Kumar', NULL, 'male', '1989-07-20', 'One of the best General Physician in Ziradei, Siwan, Bihar.', 'Social Vaidya Healthcare Siwan', 'Thepahan Bazaar, Jiradei, Siwan', 'hos_img1_1624015028.jpg', NULL, NULL, NULL, NULL, 'At Social Vaidya Medicos, Thepahan Bazaar, Near Jiradei Block, Siwan', 'SIWAN', 'Bihar', 'India', '841245', '200', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '035625', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-05-20 16:59:32'),
(22, 101, 'nnavvya33@gmail.com', '8851372676', 'Nikky', 1, 'dummy.jpg', 'Nikky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-05-20 17:04:39'),
(23, 119, 'nitty@gmail.com', '9599402170', 'Nitty', 1, 'profile_img_1624450777.png', 'Nitty', NULL, NULL, NULL, 'this is test', 'Nitty Care', 'G-130', NULL, NULL, NULL, NULL, NULL, 'G-130, Ground Floor, Sector 63, Noida', 'Noida', 'Uttar Pradesh', 'India', '201301', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'SNIHSG78000GH', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-06-23 12:27:08'),
(24, 121, 'anuj.s@aanaxagorasr.com', '9540834488', 'Testdoctor', 1, NULL, 'Testdoctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-06-24 10:18:14'),
(25, 122, 'nk@gmail.com', '9599402172', 'NK Nitty', 1, 'profile_img_1624539573.png', 'NK Nitty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-06-24 12:59:43'),
(26, 123, 'nk@gmail.com', '9599402172', 'NK Nitty', 1, 'profile_img_1624539803.png', 'NK Nitty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-06-24 13:04:14'),
(27, 124, 'anuj.s@aanaxagorasr.com', '9540834488', 'Testdoctor', 1, NULL, 'Testdoctor', NULL, NULL, NULL, NULL, 'Testdoctor', 'Testdoctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'Testdoctor', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-06-24 13:39:21'),
(28, 125, 'nitty@gmail.com', '9599402171', 'Nitty', 1, 'profile_img_1624608571.png', 'Nitty', NULL, NULL, NULL, NULL, 'Nitty Clinick', 'Noida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'ggkjjlkchjidshdj', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-06-25 08:13:01'),
(29, 129, 'drshankarsinghsiwan@gmail.com', '9919763885', 'Dr Shankar Singh', 1, 'profile_img_1626589097.jpg', 'Dr Shankar Singh', NULL, NULL, NULL, 'One of the best General Physician in Siwan, Bihar.', 'Astha Hospital Siwan', 'Benusar Buzurg, Bijehata,Siwan, Bihar - 841227', NULL, NULL, NULL, NULL, NULL, 'Benusar Buzurg, Bijehata,Siwan, Bihar - 841227', 'Siwan', 'Bihar', 'India', '841227', '300', NULL, NULL, NULL, 'MBBS, MD', 'Patna', '2003', '', '', '', '', '', '', '035645', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, '', '', '', 0, 0, '0000-00-00 00:00:00', '2021-07-16 06:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedules`
--

CREATE TABLE `doctorschedules` (
  `id` int(255) NOT NULL,
  `doctorId` int(255) NOT NULL,
  `weekday` varchar(255) DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `endtime` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reviews`
--

CREATE TABLE `doctor_reviews` (
  `id` int(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `doctorId` int(255) DEFAULT NULL,
  `patientId` int(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `likes` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_reviews`
--

INSERT INTO `doctor_reviews` (`id`, `status`, `doctorId`, `patientId`, `point`, `title`, `review`, `likes`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 1, '5', 'errefewfwe', 'sdfsdfsdf', '0', '2021-01-29 11:05:26', '2021-01-30 01:05:26'),
(7, 1, 1, 1, '4', 'Feedback', 'sxdsd', '0', '2021-01-29 12:56:17', '2021-01-30 02:56:17'),
(8, 1, 4, 1, '5', 'new', 'new', '0', '2021-01-30 08:28:54', '2021-01-30 22:28:54'),
(9, 1, 4, 1, '4', 'nice', 'good', '0', '2021-01-30 08:33:26', '2021-01-30 22:33:26'),
(13, 1, 3, 1, '5', 'hi', 'hi', '0', '2021-01-30 10:02:54', '2021-01-31 00:02:54'),
(11, 1, 1, 1, '5', 'dwadsdfcsdfc', 'dwad', '0', '2021-01-30 08:35:16', '2021-01-30 22:35:16'),
(12, 1, 1, 1, '5', 'm k', 'nlkl', '0', '2021-01-30 08:38:52', '2021-01-30 22:38:52'),
(14, 1, 3, 1, '1', 'joijoj', 'jkjo', '0', '2021-01-30 10:03:48', '2021-01-31 00:03:48'),
(4, 1, 1, 1, '5', 'wqewedqw', 'qsq', '0', '2021-01-29 06:06:16', '2021-01-29 20:06:16'),
(5, 1, 3, 25, '3', 'testing', 'test', '0', '2021-01-29 06:10:31', '2021-01-29 20:10:31'),
(15, 1, 1, 27, '3', 'ewe', 'ewe', '0', '2021-02-23 06:20:00', '2021-02-23 07:50:00'),
(16, 1, 1, 26, '3', 'ewe', 'ewe', '0', '2021-02-23 06:21:02', '2021-02-23 07:51:02'),
(17, 1, 1, 26, '4', 'kjhj', 'juhy', '1', '2021-05-30 12:15:04', '2021-05-30 19:15:04'),
(18, 1, 1, 30, '4', 'kjklj', 'kjhjjk', '1', '2021-02-26 10:08:50', '2021-02-26 11:38:50'),
(19, 1, 1, 31, '4', 'jhk', 'hjkhk', '1', '2021-03-01 09:38:34', '2021-03-01 11:08:34'),
(20, 1, 1, 30, '4', 'sdsdfds', 'sdsdsf', '0', '2021-03-15 12:20:51', '2021-03-15 13:50:51'),
(21, 1, 1, 30, '4', 'hujhg', 'hghhu', '0', '2021-03-20 08:39:56', '2021-03-20 10:09:56'),
(25, 1, 25, 25, '1', 'dd', 'ghygfytrf', '1', '2021-05-20 06:45:54', '2021-05-20 13:45:54'),
(26, 1, 27, 30, '4', 'jhg', 'jhjkh', '0', '2021-03-26 04:50:11', '2021-03-26 06:20:11'),
(27, 1, 27, 30, '3', 'good job', 'good work', '0', '2021-04-02 11:21:14', '2021-04-02 12:51:14'),
(28, 1, 25, 30, '4', 'wewqre', 'eqweq', '0', '2021-04-10 05:51:13', '2021-04-10 07:21:13'),
(29, 1, 25, 30, '4', 'jhijh', '09iu0i', '0', '2021-04-10 09:41:19', '2021-04-10 11:11:19'),
(30, 1, 25, 25, '4', 'nice work', 'your are very nice to talk', '0', '2021-05-20 06:52:51', '2021-05-20 13:52:51'),
(31, 1, 27, 30, '5', 'great', 'good', '0', '2021-04-13 05:07:11', '2021-04-13 12:07:11'),
(32, 1, 28, 30, '5', 'great', 'hi', '0', '2021-04-13 05:10:30', '2021-04-13 12:10:30'),
(41, 1, 25, 59, '4', 'good job', 'good job give', '1', '2021-05-20 06:52:16', '2021-05-20 13:52:16'),
(42, 1, 45, 53, '5', 'test', 'test', '', '2021-05-19 15:21:31', '2021-05-19 22:21:31'),
(43, 1, 25, 72, '4', 'kjk', 'kjklj', '0', '2021-05-30 12:42:25', '2021-05-30 19:42:25'),
(44, 1, 28, 59, '4', 'jklj', 'kjklj', '', '2021-05-20 07:02:23', '2021-05-20 14:02:23'),
(45, 1, 25, 72, '4', 'The subtle art of not giving a Manson', 'The subtle art of not giving a Manson', '', '2021-05-20 08:06:25', '2021-05-20 15:06:25'),
(46, 1, 25, 51, '5', 'aNAN SINGH tOMER', 'bEST DOCTOR IN A WORLD', '', '2021-06-23 08:53:25', '2021-06-23 15:53:25'),
(47, 1, 41, 51, '5', 'yup', 'yup', '', '2021-06-23 09:16:58', '2021-06-23 16:16:58'),
(48, 1, 38, 53, '3', 'This is test', 'This is test', '', '2021-06-24 13:19:26', '2021-06-24 20:19:26'),
(53, 1, 125, 126, '5', 'This is test', 'test', '', '2021-06-25 09:52:28', '2021-06-25 16:52:28'),
(52, 1, 124, 59, '3', 'test2', 'test2', '', '2021-06-25 09:45:17', '2021-06-25 16:45:17'),
(51, 1, 124, 59, '2', 'Test', 'Testing', '', '2021-06-25 09:43:06', '2021-06-25 16:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `homenotifications`
--

CREATE TABLE `homenotifications` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homenotifications`
--

INSERT INTO `homenotifications` (`id`, `title`, `img`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Today Offer', 'homenotifications_1618319975.jpg', 'http://medto.in/appointment-book', '2021-04-13 18:02:59', '2021-05-30 12:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `home_slides`
--

CREATE TABLE `home_slides` (
  `id` int(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `details` varchar(300) NOT NULL,
  `img` varchar(200) NOT NULL,
  `view` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slides`
--

INSERT INTO `home_slides` (`id`, `title`, `details`, `img`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Consumer Electronics', 'Best Electronics, Appliances & more', 'slide_1609944827.jpg', '0', '2021-01-06 14:53:47', '2021-01-06 14:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`id`, `user_id`, `description`, `attachment`, `doctor`, `date`) VALUES
(1, 31, 'Dental Filling', 'dental-test.pdf', 'Dr. Ruby Perrin\r\n', '2021-03-04'),
(2, 18, 'note.', 'hgh.txt', 'shailendra', '2021-03-02'),
(3, 18, 'note.jhjkhg', 'web.txt', 'shailendra', '2021-03-02'),
(4, 25, 'note. give your all medical detail to me', '17.png', 'Doctor', '2021-04-12'),
(5, 30, 'note.kjkl', 'search.png', 'Doctor', '2021-04-13'),
(6, 56, 'note.zsxxcxccxxccd czxdxzscsdfvgrergfvergfvsdffv', 'pharmacy.pdf', 'Admin', '2021-04-28'),
(7, 50, 'note.gfdgdfgdg take care you are in good condition', 'Screenshot (51).png', 'Doctor', '2021-04-28'),
(8, 59, 'kjlk', 'doctor-thumb-02.jpg', 'Doctor', '2021-05-03'),
(9, 59, 'joih', 'doctor-thumb-02.jpg', 'Doctor', '2021-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` longtext NOT NULL,
  `view` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `mobile`, `subject`, `msg`, `view`, `created_at`, `updated_at`) VALUES
(6, 'Dr. Qrara', 'qrara345@gmail.com', 875674567, 'For Appointment', 'Required Doctor Appointment', '1', '2021-04-02', '2021-04-02'),
(8, 'Syuiop Sty', 'synio35@gmail.com', 456677899, 'Schedule For Appointment', 'Schedule an Appointment with Best Doctors in Delhi at Apollo Hospitals New Delhi. Holistic Approach Aimed at Providing the Best Across the Entire Spectrum of Medical Care. Amenities: Advanced ICU, 24/7 Emergency Ambulance, 24/7 Nurse Care.', '1', '2021-04-02', '2021-04-02'),
(9, 'Wtyi', 'wejkjk23@gmail.com', 5567789, 'For Appointment', 'For Appointment Doctor fee', '0', '2021-04-02', '2021-04-02'),
(10, 'Wuko', 'fghyuj@gmail.com', 566777, 'fgghuj', 'apppointment', '0', '2021-04-02', '2021-04-02'),
(11, 'Quof', 'dfg234@gmail.com', 5677888999, 'product', 'Product reqired', '0', '2021-04-10', '2021-04-10'),
(12, 'Qryu', 'adgg@gmail.com', 57889999, 'fgghy', 'tgthyuujiiki', '0', '2021-04-10', '2021-04-10'),
(13, 'Rohit singh', 'patient@gmail.com', 9999181009, 'want a personal doctor', 'i m accvdfvfdvvdfvdfvdfvfdvfgfvfg  fgvsgfdv fsgv', '0', '2021-04-12', '2021-04-12'),
(14, 'cvcxvcx', 'patient@gmail.com', 9999181009, 'fdsdsc', 'fdsdscdfvd', '1', '2021-04-12', '2021-04-12'),
(15, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 9919763885, 'In my product listing, other seller product showing & recommendation occurs', 'hi', '0', '2021-04-13', '2021-04-13'),
(16, 'rohit', 'rkrkdkdkk', 999918181009, 'business purpose', 'i want to become bussiness partner', '1', '2021-04-16', '2021-04-16'),
(17, 'roniee', 'sjdjdj@gmail.com', 9999181009, 'treatment', 'hlo how are uou i m ronnie ,i want to to do merting with you', '0', '2021-04-22', '2021-04-22'),
(18, 'rajan', 'rohitsinghrajput6282@gmail.com', 9999181009, 'fxfddf,kfd,k', 'my Name is rohit from delhi u have been waitingfsfdjdfjmfdjm', '0', '2021-04-23', '2021-04-23'),
(19, 'rajan', 'rohitsinghrajput6282@gmail.com', 9999181009, 'fxfddf,kfd,k', 'my Name is rohit from delhi u have been waitingfsfdjdfjmfdjm', '1', '2021-04-23', '2021-04-23'),
(20, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 9919763885, 'In my product listing, other seller product showing & recommendation occurs', 'hi', '1', '2021-05-02', '2021-06-02'),
(21, 'Thomaskab', 'hrhmbambi@gmail.com', 87792171232, 'Bulk Supply to Cameroon', 'Dear Director, \r\nWe are interested in your products. If your company can handle a bulk supply of your products to Cameroon, please contact us. \r\nPlease forward copy of your reply to hrhbahmbi3@oepd.org    Regards HRM Bah Mbi', '1', '2021-06-05', '2021-07-04'),
(22, 'Mike Freeman', 'no-replydeteGymN@gmail.com', 84342686359, 'SEO Metrics Boost', 'Hi there \r\n \r\nIncrease your medto.in SEO metrics values with us and get more visibility and exposure for your website. \r\n \r\nMore info: \r\nhttps://www.monkeydigital.org/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.org/product/ahrefs-dr50-ur70-seo-plan/ \r\nhttps://www.monkeydigital.org/product/trust-flow-seo-package/ \r\n \r\n \r\nthank you \r\nMike Freeman', '0', '2021-06-17', '2021-06-17'),
(23, 'Mike Bradberry', 'no-replyAcege@gmail.com', 89552654623, 'Local SEO for more business', 'Howdy \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Bradberry\r\n \r\nSpeed SEO Digital Agency', '1', '2021-06-23', '2021-07-04'),
(24, 'Tom Martino', 'baasiminvestment@gmail.com', 83512269817, 'DO YOU NEED A BUSINESS INVESTOR?', 'We have business partners who are willing to invest any amount into your business. \r\nFor more information contact: info@baasim.com', '1', '2021-06-24', '2021-07-04'),
(25, 'Mike Russel', 'vigliotticatherine32@gmail.com', 82469813216, 'cheap monthly SEO plans', 'Hi \r\n \r\nI have just took a look on your SEO for  medto.in for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Russel\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '1', '2021-07-01', '2021-07-04'),
(26, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 9919763885, 'In my product listing, other seller product showing & recommendation occurs', 'Just for testing purpose.', '1', '2021-07-04', '2021-07-04'),
(27, 'Yasuhiro Yamada', 'info.rohtopharmaceutical@gmail.com', 87258155311, 'Representative Request', 'Hello, \r\n \r\n \r\nWith all due respect. If you are based in United States or Canada, I write to inform you that we need you to serve as our Spokesperson/Financial Coordinator for our company ROHTO PHARMACEUTICAL CO., LTD. and its clients in the United States and Canada. It\'s a part-time job and will only take few minutes of your time daily and it will not bring any conflict of interest in case you are working with another company. If interested reply me using this email address: admin@rohtopharmaceutical.jp \r\n \r\n \r\nYasuhiro Yamada \r\nSenior Executive Officer, \r\nROHTO Pharmaceutical Co.,Ltd. \r\n1-8-1 Tatsumi-nishi, \r\nIkuno-Ku, Osaka, 544-8666, \r\nJapan.', '0', '2021-07-08', '2021-07-08'),
(28, 'Basmah Abdulaziz', 'amira966@protonmail.com', 83238778519, 'Partnership', 'Hello Dear,  \r\nAs-salamu alaykum \r\nHope this email meets you at your best, My name is Basmah Amira Bint Saud Bin Abdulaziz Al-Saud from Jeddah, Saudi Arabia,  I have not done business in your country before, I want to invest through you as am not allowed to venture into business as a lady. After Covid-19 Pandemic am not allowed to travel outside my country. \r\n \r\nI need your help to invest a total of USD $25.5 M deposited in a vaults with Euroclear with my names ready to  be invested. \r\n \r\nIf you are interested, kindly contact me to send all proof of funds to you for your consideration. I cannot say everything here. Kindly get back to me if you\'re interested and need more details. \r\nReach me on amira@helasaud.live or helinamoha7@gmail.com. \r\n \r\nBest Regards,  \r\nBasmah Amira Bint Saud Bin Abdulaziz Al-Saud \r\nSaudi Arabia', '0', '2021-07-09', '2021-07-09'),
(29, 'SEO X Press Digital Agency', 'karynsolter32@gmail.com', 87868872729, 'Ultimate SEO Solutions for medto.in', 'Hi \r\n \r\n \r\nI have just took a look on your SEO for  medto.in for its SEO ranks and saw that your website could use a boost. \r\n \r\n \r\nWe will improve your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digital-x-press.com \r\n \r\n \r\nregards \r\nMike Gilmore\r\n \r\nSEO X Press Digital Agency \r\nhttps://www.digital-x-press.com', '0', '2021-07-14', '2021-07-14'),
(30, 'Mike Walkman', 'clarineso32@gmail.com', 85612619387, 'Increase sales for medto.in', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your %domain% website? \r\nHaving a high DA score, always helps \r\n \r\nGet your %domain% to have an amazing DA score in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Walkman\r\n \r\nsupport@monkeydigital.co', '0', '2021-07-15', '2021-07-15'),
(31, 'Donald Cole', 'kendrickbells@donaldocole.com', 81518135845, 'Partnership', 'Good day \r\n \r\nI`m seeking a reputable company/individual to partner with in a manner that would benefit both parties. The project is worth $24 Million so \r\nIf interested, kindly contact me through this email donaldcole@donaldocole.com for clarification. \r\n \r\nI await your response. \r\n \r\nThanks, \r\n \r\nDonald Cole', '0', '2021-07-16', '2021-07-16'),
(32, 'Bernt Maes', 'c_ontactreports87495@outlook.hu', 86192623325, 'Cold Steel for Hot Girls at Lock-Master.com', '5000+ Quality 3D Metal-Bondage and latex slavery pictures:  https://lock-master.com/ \r\nPreviews:   https://lock-master.com/previews/', '0', '2021-07-20', '2021-07-20'),
(33, 'Mike Gustman', 'jayneguer32@gmail.com', 82876974365, 'Local SEO for more business', 'Greetings \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Gustman\r\n \r\nSpeed SEO Digital Agency', '0', '2021-07-22', '2021-07-22'),
(34, 'Mike Wainwright', 'abelsolis7162@gmail.com', 85726178978, 'affordable monthly SEO plans', 'Hello \r\n \r\nI have just took an in depth look on your  medto.in for the ranking keywords and saw that your website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Wainwright\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '0', '2021-07-29', '2021-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(200) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `mrp` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `saving` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `tax_type` varchar(100) DEFAULT NULL,
  `tax` double NOT NULL DEFAULT 0,
  `tax_price` double DEFAULT 0,
  `total_taxprice` double NOT NULL DEFAULT 0,
  `final_taxprice` double DEFAULT NULL,
  `subtotal_price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `total_saving` double DEFAULT NULL,
  `final_subtoatal_price` double DEFAULT NULL,
  `final_price` int(11) DEFAULT NULL,
  `final_saving` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_mobile` bigint(20) DEFAULT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_city` varchar(100) DEFAULT NULL,
  `user_state` varchar(100) DEFAULT NULL,
  `user_country` varchar(20) DEFAULT NULL,
  `user_zipcode` int(11) DEFAULT NULL,
  `seller_id` int(100) DEFAULT NULL,
  `seller_name` varchar(200) DEFAULT NULL,
  `seller_email` varchar(100) DEFAULT NULL,
  `seller_mobile` int(10) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `cart` enum('1','0') DEFAULT NULL,
  `order` enum('1','0') DEFAULT NULL,
  `status` enum('new','processing','completed','cancelled') DEFAULT NULL,
  `view` enum('1','0') DEFAULT NULL,
  `payment` enum('1','0') NOT NULL DEFAULT '0',
  `payment_method` varchar(100) NOT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `pre_img` varchar(100) NOT NULL,
  `billing_det` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cancelled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `category_id`, `product_id`, `product_name`, `mrp`, `price`, `currency`, `discount`, `saving`, `quantity`, `tax_type`, `tax`, `tax_price`, `total_taxprice`, `final_taxprice`, `subtotal_price`, `total_price`, `total_saving`, `final_subtoatal_price`, `final_price`, `final_saving`, `user_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_city`, `user_state`, `user_country`, `user_zipcode`, `seller_id`, `seller_name`, `seller_email`, `seller_mobile`, `img`, `cart`, `order`, `status`, `view`, `payment`, `payment_method`, `month`, `year`, `pre_img`, `billing_det`, `created_at`, `updated_at`, `cancelled_at`) VALUES
(204, 'MED101756012', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 14, 'GST', 10, 6.8, 95.2, 121.5, 856.8, 952, 238, 1288.5, 1410, 134, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-66,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-02 10:37:12', '2021-05-02 10:37:12', NULL),
(205, 'MED101756012', 18, 26, 'Health Concerns', 490, 390, '₹', 20.4, 100, 1, 'GST', 5, 19.5, 0, 121.5, NULL, NULL, NULL, 1288.5, 1410, 134, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-66,noida , up', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614588353.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-02 10:37:12', '2021-05-02 10:37:12', NULL),
(206, 'MED101756012', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 0, 121.5, NULL, NULL, NULL, 1288.5, 1410, 134, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-66,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-02 10:37:12', '2021-05-02 10:37:12', NULL),
(209, 'MED104912684', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 0, 125.6, NULL, NULL, NULL, 259.4, 385, 63, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-78,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 06:57:21', '2021-05-03 06:57:21', NULL),
(210, 'MED116662415', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 59, 'Patient', 'patient@gmail.com', 8978675645, 'jiui', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 08:23:26', '2021-05-03 08:23:26', NULL),
(215, 'MED107951524', 17, 25, 'Diabetes Care', 895, 765, '₹', 14.5, 130, 1, 'GST', 6, 45.9, 45.9, 45.9, 719.1, 765, 130, 719.1, 765, 130, 59, 'Patient', 'patient@gmail.com', 8978675645, 'hjk', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581470.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 10:46:42', '2021-05-03 10:46:42', NULL),
(216, 'MED104868819', 22, 28, 'Gillette Mach', 278, 249, '₹', 10.4, 29, 1, 'GST', 45, 112, 112, 157.3, 137, 249, 29, 509.7, 667, 186, 29, 'Pharmacy', 'pharmacy@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Meethapur,Tanki Road,Badarpur,New Delhi-44', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614851614.jpg', '1', '0', 'new', '0', '0', '', 'May', 2021, '', '1', '2021-05-03 10:49:20', '2021-05-03 10:49:20', NULL),
(217, 'MED104868819', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 0, 157.3, NULL, NULL, NULL, 509.7, 667, 186, 29, 'Pharmacy', 'pharmacy@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Meethapur,Tanki Road,Badarpur,New Delhi-44', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '1', '0', 'new', '0', '0', '', 'May', 2021, '', '1', '2021-05-03 10:49:20', '2021-05-03 10:49:20', NULL),
(219, 'MED104868819', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 0, 157.3, NULL, NULL, NULL, 509.7, 667, 186, 29, 'Pharmacy', 'pharmacy@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Meethapur,Tanki Road,Badarpur,New Delhi-44', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '1', '0', 'new', '0', '0', '', 'May', 2021, '', '1', '2021-05-03 10:49:20', '2021-05-03 10:49:20', NULL),
(220, 'MED114358932', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 59, 'Patient', 'patient@gmail.com', 8978675645, 'jkl', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 10:56:47', '2021-05-03 10:56:47', NULL),
(222, 'MED119783540', 15, 27, 'Anti-Hair Fall Spa Kit', 1670, 986, '₹', 41, 684, 1, 'GST', 5, 49.3, 49.3, 49.3, 936.7, 986, 684, 936.7, 986, 684, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-66,noida , up', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614675658.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 11:04:17', '2021-05-03 11:04:17', NULL),
(224, 'MED113482767', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 0, 45.3, NULL, NULL, NULL, 372.7, 418, 157, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 11:20:12', '2021-05-03 11:20:12', NULL),
(225, 'MED10535118', 15, 27, 'Anti-Hair Fall Spa Kit', 1670, 986, '₹', 41, 684, 1, 'GST', 5, 49.3, 0, 56.1, NULL, NULL, NULL, 997.9, 1054, 701, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614675658.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 11:46:55', '2021-05-03 11:46:55', NULL),
(226, 'MED115729305', 15, 27, 'Anti-Hair Fall Spa Kit', 1670, 986, '₹', 41, 684, 1, 'GST', 5, 49.3, 49.3, 87.8, 936.7, 986, 684, 1248.2, 1336, 824, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614675658.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 11:59:43', '2021-05-03 11:59:43', NULL),
(227, 'MED10446870', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 0, 87.8, NULL, NULL, NULL, 1248.2, 1336, 824, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-78,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 11:50:53', '2021-05-03 11:50:53', NULL),
(228, 'MED115729305', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 0, 87.8, NULL, NULL, NULL, 1248.2, 1336, 824, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 11:59:43', '2021-05-03 11:59:43', NULL),
(229, 'MED107973730', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 52.9, 61.2, 68, 17, 673.1, 726, 145, 59, 'Patient', 'patient@gmail.com', 67890656788, 'Sector-78,noida , up', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 12:02:08', '2021-05-03 12:02:08', NULL),
(230, 'MED107973730', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 0, 52.9, NULL, NULL, NULL, 673.1, 726, 145, 59, 'Patient', 'patient@gmail.com', 67890656788, 'Sector-78,noida , up', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 12:02:08', '2021-05-03 12:02:08', NULL),
(231, 'MED111159592', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 6.8, 61.2, 68, 17, 61.2, 68, 17, 59, 'Patient', 'patient@gmail.com', 67890656788, 'Sector-78,noida , up', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 12:24:07', '2021-05-03 12:24:07', NULL),
(232, 'MED118787917', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 59, 'Patient', 'patient@gmail.com', 67890656788, 'Sector-98,noida , up', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 12:42:25', '2021-05-03 12:42:25', NULL),
(233, 'MED116626771', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-78,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 13:23:50', '2021-05-03 13:23:50', NULL),
(234, 'MED118738389', 17, 25, 'Diabetes Care', 895, 765, '₹', 14.5, 130, 1, 'GST', 6, 45.9, 45.9, 45.9, 719.1, 765, 130, 719.1, 765, 130, 59, 'Patient', 'patient@gmail.com', 8987675645, 'gyutyu', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581470.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 13:24:06', '2021-05-03 13:24:06', NULL),
(235, 'MED117329675', 15, 27, 'Anti-Hair Fall Spa Kit', 1670, 986, '₹', 41, 684, 1, 'GST', 5, 49.3, 49.3, 56.1, 936.7, 986, 684, 997.9, 1054, 701, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614675658.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 13:25:30', '2021-05-03 13:25:30', NULL),
(236, 'MED117329675', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 0, 56.1, NULL, NULL, NULL, 997.9, 1054, 701, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 13:25:30', '2021-05-03 13:25:30', NULL),
(237, 'MED115935373', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 1, 'Admin', 'admin@gmail.com', NULL, NULL, 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 13:36:37', '2021-05-03 13:36:37', NULL),
(238, 'MED110294047', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 6.8, 61.2, 68, 17, 61.2, 68, 17, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-78,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 13:38:09', '2021-05-03 13:38:09', NULL),
(239, 'MED119783491', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-78,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-03 14:08:30', '2021-05-03 14:08:30', NULL),
(240, 'MED114432239', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 59, 'Patient', 'patient@gmail.com', 67890656788, 'Sector-98,noida , up', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-04 05:49:55', '2021-05-04 05:49:55', NULL),
(241, 'MED108355210', 17, 25, 'Diabetes Care', 895, 765, '₹', 14.5, 130, 1, 'GST', 6, 45.9, 45.9, 45.9, 719.1, 765, 130, 719.1, 765, 130, 53, 'Nitish Kumar', 'nitish@aanaxagorasr.in', NULL, 'test', NULL, NULL, NULL, NULL, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581470.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-04 06:26:03', '2021-05-04 06:26:03', NULL),
(242, 'MED112817180', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 26.3, 61.2, 68, 17, 431.7, 458, 117, 53, 'Nitish Kumar', 'nitish@aanaxagorasr.in', 9599402171, 'jfjhgkgkjkj', NULL, NULL, NULL, NULL, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-07 11:38:36', '2021-05-07 11:38:36', NULL),
(243, 'MED111478210', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 6.8, 61.2, 68, 17, 61.2, 68, 17, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-78,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-05 11:32:22', '2021-05-05 11:32:22', NULL),
(244, 'MED115488629', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-05 11:34:12', '2021-05-05 11:34:12', NULL),
(245, 'MED102687283', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 6.8, 61.2, 68, 17, 61.2, 68, 17, 1, 'Admin', 'admin@gmail.com', 67890656788, 'Sector-98,noida , up', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-05 11:42:03', '2021-05-05 11:42:03', NULL),
(248, 'MED103664593', 15, 23, 'Tentex Forte 10 Tablet', 85, 68, '₹', 20, 17, 1, 'GST', 10, 6.8, 6.8, 6.8, 61.2, 68, 17, 61.2, 68, 17, 1, 'Admin1', 'admin@gmail.com', 4567788899, 'B-56,sector-56,Noida,UP,india', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614580965.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-06 14:34:10', '2021-05-06 14:34:10', NULL),
(249, 'MED115738043', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 59, 'Anuj', 'patient@gmail.com', 9999999999, 'noida', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-07 04:35:43', '2021-05-07 04:35:43', NULL),
(250, 'MED112817180', 18, 26, 'Health Concerns', 490, 390, '₹', 20.4, 100, 1, 'GST', 5, 19.5, 0, 26.3, NULL, NULL, NULL, 431.7, 458, 117, 53, 'Nitish Kumar', 'nitish@aanaxagorasr.in', 9599402171, 'jfjhgkgkjkj', NULL, NULL, NULL, NULL, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614588353.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-07 11:38:36', '2021-05-07 11:38:36', NULL),
(251, 'MED114411708', 18, 26, 'Health Concerns', 490, 390, '₹', 20.4, 100, 1, 'GST', 5, 19.5, 19.5, 19.5, 370.5, 390, 100, 370.5, 390, 100, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614588353.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-11 07:52:06', '2021-05-11 07:52:06', NULL),
(252, 'MED116171093', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 94, 'Belal Ahmad', 'belalahmad85788@gmail.com', 8578841342, 'Sahyog Hospital, Patna 40, Patliputra colony, Patna, Bihar - 800013', NULL, NULL, NULL, NULL, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-11 12:07:28', '2021-05-11 12:07:28', NULL),
(253, 'MED102470795', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', 'processing', '0', '1', '', 'May', 2021, '', '1', '2021-05-12 07:33:38', '2021-05-13 10:45:20', NULL),
(254, 'MED106192533', 17, 25, 'Diabetes Care', 895, 765, '₹', 14.5, 130, 5, 'GST', 6, 45.9, 229.5, 229.5, 3595.5, 3825, 650, 3595.5, 3825, 130, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581470.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-18 12:32:46', '2021-05-18 12:32:46', NULL),
(255, 'MED104296203', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 28, 'Hospital', 'hospital@gmail.com', 9998898889, 'D-56,sector-56,Noida,UP,india', 'noida', 'up', 'India', 201301, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '1', '0', 'new', '0', '0', '', 'May', 2021, '', '1', '2021-05-20 07:49:22', '2021-05-20 07:49:22', NULL),
(256, 'MED114233863', 15, 27, 'Anti-Hair Fall Spa Kit', 1670, 986, '₹', 41, 684, 1, 'GST', 5, 49.3, 49.3, 49.3, 936.7, 986, 684, 936.7, 986, 684, 1, 'Admin', 'admin@gmail.com', 4567788899, 'B-56,sector-56,Noida,UP,india', 'Noida', 'UP', 'India', 5667, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614675658.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-20 08:23:43', '2021-05-20 08:23:43', NULL),
(257, 'MED103028866', 17, 25, 'Diabetes Care', 895, 765, '₹', 14.5, 130, 1, 'GST', 6, 45.9, 45.9, 45.9, 719.1, 765, 130, 719.1, 765, 130, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581470.jpg', '0', '0', '', '0', '1', '', 'May', 2021, '', '1', '2021-05-20 11:58:21', '2021-05-24 06:50:45', NULL),
(259, 'MED112599115', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 114, 'Ashish Sah', 'ashish.ashish.sah94@gmail.com', 9694855815, NULL, NULL, NULL, NULL, NULL, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '1', '0', 'new', '0', '0', '', 'May', 2021, '', '1', '2021-05-25 17:37:21', '2021-05-25 17:37:21', NULL),
(260, 'MED111041425', 22, 28, 'Gillette Mach', 278, 249, '₹', 10.4, 29, 1, 'GST', 45, 112, 112, 112, 137, 249, 29, 137, 249, 29, 115, 'PINTU KUMAR SAH', 'pintukuamr7@gmail.com', 7631547586, 'Vill dudaha karsar raghunathpur siwan bihar', NULL, NULL, NULL, NULL, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614851614.jpg', '1', '0', 'new', '0', '0', '', 'May', 2021, '', '1', '2021-05-27 11:13:18', '2021-05-27 11:13:18', NULL),
(264, 'MED112890151', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-29 07:19:44', '2021-05-29 07:19:44', NULL),
(265, 'MED119549575', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', NULL, 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'May', 2021, '', '1', '2021-05-29 09:10:33', '2021-05-29 09:10:33', NULL),
(266, 'MED119876948', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 1, 'Admin', 'admin@gmail.com', 4567788899, 'B-56,sector-56,Noida,UP,india', 'Noida', 'UP', 'India', 5667, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', '', '0', '1', '', 'May', 2021, '', '1', '2021-05-30 12:06:47', '2021-06-02 11:47:29', NULL),
(267, 'MED105613323', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 116, 'Shalikram Patel', 'shalikpatel8853@gmail.com', 918853633907, 'lalitpur', 'LALITPUR', 'Uttar pradesh', 'India', 284403, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'June', 2021, '', '1', '2021-06-02 08:25:01', '2021-06-02 08:25:01', NULL),
(268, 'MED107056212', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 89, 'Editor', 'editor@gmail.com', 9919763885, 'Vill-Kairatal,Post-Sarawe,Dist-Siwan', 'Siwan', 'Bihar', 'India', 841227, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'June', 2021, '', '1', '2021-06-02 08:25:48', '2021-06-02 08:25:48', NULL),
(269, 'MED112036668', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 58, 311.5, 350, 140, 682, 740, 240, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'new', '0', '1', '', 'June', 2021, '', '1', '2021-06-07 05:36:45', '2021-06-07 05:36:45', NULL),
(270, 'MED106137235', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 12, 'GST', 11, 38.5, 462, 731.5, 3738, 4200, 1680, 5918.5, 6650, 420, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 9919763885, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'SIWAN', 'Bihar', 'India', 841226, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '1', '0', 'new', '0', '0', '', 'June', 2021, '', '1', '2021-06-07 12:56:53', '2021-06-07 12:56:53', NULL),
(271, 'MED106137235', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 6, 'GST', 11, 38.5, 0, 731.5, NULL, NULL, NULL, 5918.5, 6650, 420, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 9919763885, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'SIWAN', 'Bihar', 'India', 841226, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '1', '0', 'new', '0', '0', '', 'June', 2021, '', '1', '2021-06-07 12:56:53', '2021-06-07 12:56:53', NULL),
(272, 'MED112036668', 18, 26, 'Health Concerns', 490, 390, '₹', 20.4, 100, 1, 'GST', 5, 19.5, 0, 58, NULL, NULL, NULL, 682, 740, 240, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614588353.jpg', '0', '0', 'new', '0', '1', '', 'June', 2021, '', '1', '2021-06-07 05:36:45', '2021-06-07 05:36:45', NULL),
(273, 'MED106137235', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 0, 731.5, NULL, NULL, NULL, 5918.5, 6650, 420, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 9919763885, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'SIWAN', 'Bihar', 'India', 841226, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '1', '0', 'new', '0', '0', '', 'June', 2021, '', '1', '2021-06-07 12:56:53', '2021-06-07 12:56:53', NULL),
(277, 'MED104146443', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', '', '0', '1', '', 'June', 2021, '', '1', '2021-06-22 06:28:14', '2021-06-22 08:46:31', NULL),
(278, 'MED103141003', 16, 24, 'BABY BATH DUO', 786, 658, '₹', 16.3, 128, 1, 'GST', 7, 46.1, 46.1, 46.1, 611.9, 658, 128, 611.9, 658, 128, 53, 'Nitish Kumar', 'nitish@aanaxagorasr.in', 7479825862, 'KATIHAR', 'KATIHAR', 'BIHAR', 'India', 854104, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581308.jpg', '0', '0', 'new', '0', '1', '', 'June', 2021, '', '1', '2021-06-22 12:30:20', '2021-06-22 12:30:20', NULL),
(279, 'MED119576982', 15, 22, 'Pain Oil', 490, 350, '₹', 28.6, 140, 1, 'GST', 11, 38.5, 38.5, 38.5, 311.5, 350, 140, 311.5, 350, 140, 59, 'Patient', 'patient@gmail.com', 9999181009, 'A-83/2,Harsh Vihar,Tanki road, Meethaapur, Badarpur ,New Delhi -44', 'New delhi', 'Delhi', 'India', 110044, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581096.jpg', '0', '0', 'completed', '0', '1', '', 'June', 2021, '', '1', '2021-06-22 12:37:03', '2021-06-23 12:02:54', NULL),
(280, 'MED116065277', 17, 25, 'Diabetes Care', 895, 765, '₹', 14.5, 130, 1, 'GST', 6, 45.9, 45.9, 45.9, 719.1, 765, 130, 719.1, 765, 130, 53, 'Nitish Kumar', 'nitish@aanaxagorasr.in', 7479825862, 'KATIHAR', 'KATIHAR', 'BIHAR', 'India', 854104, 1, 'Admin', 'admin@gmail.com', 567876656, 'product_1614581470.jpg', '0', '0', 'new', '0', '1', '', 'June', 2021, '', '1', '2021-06-22 12:53:26', '2021-06-22 12:53:26', NULL),
(281, 'MED117476319', 18, 26, 'Health Concerns', 490, 390, '₹', 20.4, 100, 100, 'GST', 5, 19.5, 1950, 1950, 37050, 39000, 10000, 37050, 39000, 100, 51, 'Lalit', 'lalitraghav457@gmail.com', 7827820996, 'G-130 , Aanaxagorasr Pvt. Ltd. Noida', 'Ghaziabad', 'UP', 'India', 201013, 29, 'Pharmacy', 'pharmacy@gmail.com', 678654345, 'product_1614588353.jpg', '0', '0', 'completed', '0', '1', '', 'June', 2021, '', '1', '2021-06-23 09:13:40', '2021-06-23 12:00:10', NULL),
(285, 'MED114373796', 15, 29, 'Test', 1, 1, '₹', 0, 0, 1, 'GST', 18, 0.1, 0.1, 0.1, 0.9, 1, 0, 0.9, 1, 0, 53, 'Nitish Kumar', 'nitish@aanaxagorasr.in', 9599402171, 'G-130', 'Noida', 'UP', 'India', 201301, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 2147483647, 'product_1624449467.png', '0', '0', 'completed', '0', '1', '', 'June', 2021, '', '1', '2021-06-23 11:59:34', '2021-06-23 12:04:07', NULL),
(287, NULL, 15, 29, 'Test', 1, 1, '₹', 0, 0, 17, 'GST', 18, 0.1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 51, 'Lalit', 'lalitraghav457@gmail.com', 7827820996, 'G-130 , Aanaxagorasr Pvt. Ltd. Noida', 'Ghaziabad', 'UP', 'India', 201013, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 2147483647, 'product_1624449467.png', '1', '0', NULL, NULL, '0', '', NULL, NULL, '', '0', '2021-06-24 09:25:12', '2021-06-24 09:26:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(130) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `email`, `status`, `password`, `dob`, `age`, `blood_group`, `address`, `city`, `state`, `zipcode`, `country`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Srishti', '8858596575', 'srishti@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', '1999-01-03', 21, 'A-', 'Allahabad', 'Allahabad', 'UP', '227804', 'India', 'patient11.jpg', '2020-12-28 06:13:56', '2020-12-30 11:52:05'),
(2, 'akarshit', '8858596575', 'akarshit@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', '2020-12-30', 25, 'A-', 'Ghaziabad', 'delhi', 'up', '2010009', 'India', 'patient10.jpg', '2020-12-28 06:23:31', '2021-02-01 21:10:42'),
(3, 'sukanya', '8899775566', 'sukanya@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'patient9.jpg', '2020-12-31 09:49:31', '2021-01-14 00:30:05'),
(4, 'new', '09988998877', 'new@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-09 12:51:35', '2021-01-10 02:51:35'),
(5, 'abc', '09988998877', 'abc@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-16 10:45:23', '2021-01-17 00:45:23'),
(6, 'lalit Raghav', '09977998877', 'lalit@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-16 10:48:02', '2021-01-17 00:48:02'),
(7, 'Shaifali', '09988998877', 'shaifali@gmail.com', 1, 'fcda9ccc0e7dab4f949f89d4b49964c0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-16 10:53:21', '2021-01-17 00:53:21'),
(8, 'deeksha', '09988998877', 'deeksha@gmail.com', 1, '921c57648883fe285cbb4645190877f1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-16 10:55:53', '2021-01-17 00:55:53'),
(9, 'Deepak Anand', '9919763885', 'socialvaidya@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-25 10:46:03', '2021-01-26 00:46:03'),
(10, 'Lalit', '07827820996', 'superadmin@gmail.com', 1, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-30 06:40:42', '2021-01-30 20:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p><strong>MedTo</strong> value the trust you place in us and recognize the importance of secure transactions and information privacy. Form, providing your information or availing of our product/service, you expressly agree to be bound by the terms and conditions of this Privacy Policy, the&nbsp;<a href=\"https://www.flipkart.com/pages/terms\">Terms of Use</a>,&nbsp;and the applicable service/product terms and conditions. If you do not agree, please do not access or use our Platform.</p>\r\n\r\n<p><strong>1. Collection of Your Information</strong></p>\r\n\r\n<p>When you use our Platform, we collect and store your information which is provided by you from time to time. In general, you can browse the Platform without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information by choosing not to use a particular service, product, or feature on the Platform.</p>\r\n\r\n<p>We may track your buying behavior, preferences, and other information that you choose to provide on our Platform. We use this information to do internal research on our users&#39; demographics, interests, and behavior to better understand, protect and serve our users. This information is compiled and analyzed on an aggregated basis. This information may include the URL that you just came from (whether this URL is on our Platform or not), which URL you next go to (whether this URL is on our Platform or not), your computer browser information, and your IP address.</p>\r\n\r\n<p>We collect personal information (such as email address, delivery address, name, phone number, credit card/debit card, and other payment instrument details) from you when you set up an account or transact with us. While you can browse some sections of our Platform without being a registered member, certain activities (such as placing an order or consuming our online content or services) do require registration. We do use your contact information to send you offers based on your previous orders and your interests.</p>\r\n\r\n<p>If you choose to post messages on our message boards, chat rooms, or other message areas or leave feedback, or if you use voice commands to shop on the Platform, we will collect that information you provide to us. We retain this information as necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by law.</p>\r\n\r\n<p>If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Platform, we may collect such information into a file specific to you.</p>\r\n\r\n<p><strong>2. Use of Demographic / Profile Data / Your Information</strong></p>\r\n\r\n<p>We use your personal information to provide the product and services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt out of such uses. We use your personal information to assist sellers and business partners in handling and fulfilling orders; enhancing the customer experience; resolve disputes; troubleshoot problems; help promote a safe service; collect money; measure consumer interest in our products and services; inform you about online and offline offers, products, services, and updates; customize and enhance your experience; detect and protect us against error, fraud, and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection of information.</p>\r\n\r\n<p>With your consent, we will have access to your SMS, contacts in your directory, location, and device information. We may also request you to provide your PAN, GST Number, Government issued ID cards/number, and Know-Your-Customer (KYC) details to (i) check your eligibility for certain products and services including but not limited to credit and payment products; (ii) issue GST invoice for the products and services purchased for your business requirements; (iii) enhance your experience on the Platform and provide you access to the products and services being offered by us, sellers, affiliates or lending partners. You understand that your access to these products/services may be affected in the event consent is not provided to us.</p>\r\n\r\n<p>In our efforts to continually improve our product and service offerings, we and our affiliates collect and analyze demographic and profile data about our users&#39; activity on our Platform. We identify and use your IP address to help diagnose problems with our server and to administer our Platform. Your IP address is also used to help identify you and to gather broad demographic information.</p>\r\n\r\n<p>We will occasionally ask you to participate in optional surveys conducted either by us or through a third-party market research agency. These surveys may ask you for personal information, contact information, date of birth, demographic information (like zip code, age, or income level), attributes such as your interests, household or lifestyle information, your purchasing behavior or history, preferences, and other such information that you may choose to provide. The surveys may involve the collection of voice data or video recordings, the participation of which would purely be voluntary in nature. We use this data to tailor your experience at our Platform, providing you with content that we think you might be interested in and displaying the content according to your preferences.</p>\r\n\r\n<p><strong>3. Cookies</strong></p>\r\n\r\n<p>We use data collection devices such as &quot;cookies&quot; on certain pages of the Platform to help analyze our web page flow, measure promotional effectiveness, and promote trust and safety. &quot;Cookies&quot; are small files placed on your hard drive that assist us in providing our services. Cookies do not contain any of your personal information. We offer certain features that are only available through the use of a &quot;cookie&quot;. We also use cookies to allow you to enter your password less frequently during a session. Cookies can also help us provide information that is targeted to your interests. Most cookies are &quot;session cookies,&quot; meaning that they are automatically deleted from your hard drive at the end of a session. You are always free to decline/delete our cookies if your browser permits, although in that case, you may not be able to use certain features on the Platform and you may be required to re-enter your password more frequently during a session. Additionally, you may encounter &quot;cookies&quot; or other similar devices on certain pages of the Platform that are placed by third parties. We do not control the use of cookies by third parties. We use cookies from third-party partners such as Google Analytics for marketing and analytical purposes.</p>\r\n\r\n<p><strong>4. Sharing of personal information</strong></p>\r\n\r\n<p>We may share personal information with our other corporate entities and affiliates for purposes of providing products and services offered&nbsp; These entities and affiliates may share such information with their affiliates, business partners, and other third parties for the purpose of providing you their products and services, and may market to you as a result of such sharing unless you are explicitly opt-out.</p>\r\n\r\n<p>We may disclose your personal information to third parties, such as sellers, business partners. This disclosure may be required for us to provide you access to our products and services; for the fulfillment of your orders; for enhancing your experience; for providing feedback on products; to collect payments from you; to comply with our legal obligations; to conduct market research or surveys; to enforce our Terms of Use; to facilitate our marketing and advertising activities; to analyze data; for customer service assistance; to prevent, detect, mitigate, and investigate fraudulent or illegal activities related to our product and services. We do not disclose your personal information to third parties for their marketing and advertising purposes without your explicit consent.</p>\r\n\r\n<p>We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or another legal process. We may disclose personal information to law enforcement agencies, third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms of Use or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public.</p>\r\n\r\n<p>We and our affiliates will share/sell some or all of your personal information with another business entity should we (or our assets) plan to merge with, or be acquired by that business entity, or re-organization, amalgamation, restructuring of business. Should such a transaction occur that another business entity (or the new combined entity) will be required to follow this Privacy Policy with respect to your personal information?</p>\r\n\r\n<p><strong>5. Links to Other Sites</strong></p>\r\n\r\n<p>Our Platform may provide links to other websites or applications that may collect personal information about you. We are not responsible for the privacy practices or the content of those linked websites.</p>\r\n\r\n<p><strong>6. Security Precautions</strong></p>\r\n\r\n<p>We maintain reasonable physical, electronic and procedural safeguards to protect your information. Whenever you access your account information, we offer the use of a secure server. Once your information is in our possession we adhere to our security guidelines to protect it against unauthorized access. However, by using the Platform, the users accept the inherent security implications of data transmission over the internet and the World Wide Web which cannot always be guaranteed as completely secure, and therefore, there would always remain certain inherent risks regarding the use of the Platform. Users are responsible for ensuring the protection of login and password records for their accounts.</p>\r\n\r\n<p><strong>7. Choice/Opt-Out</strong></p>\r\n\r\n<p>We provide all users with the opportunity to opt out of receiving non-essential (promotional, marketing-related) communications after setting up an account with us.</p>\r\n\r\n<p><strong>8. Advertisements on Platform</strong></p>\r\n\r\n<p>We use third-party advertising companies to serve ads when you visit our Platform. These companies may use information (not including your name, address, email address, or telephone number) about your visits to this and other websites in order to provide advertisements about goods and services of interest to you.</p>\r\n\r\n<p><strong>9. Children Information</strong></p>\r\n\r\n<p>We do not knowingly solicit or collect personal information from children under the age of 18 and use of our Platform is available only to persons who can form a legally binding contract under the Indian Contract Act, 1872. If you are under the age of 18 years then you must use the Platform, application, or services under the supervision of your parent, legal guardian, or any responsible adult.</p>\r\n\r\n<p><strong>10. Data Retention</strong></p>\r\n\r\n<p>We retain your personal information in accordance with appliable laws, for a period no longer than is required for the purpose for which it was collected or as required under any applicable law. However, we may retain data related to you if we believe it may be necessary to prevent fraud or future abuse or if required by law or for other legitimate purposes. We may continue to retain your data in anonymized form for analytical and research purposes.</p>\r\n\r\n<p><strong>11. Your Consent</strong></p>\r\n\r\n<p>By visiting our Platform or by providing your information, you consent to the collection, use, storage, disclosure, and otherwise processing of your information (including sensitive personal information) on the Platform in accordance with this Privacy Policy. If you disclose to us any personal information relating to other people, you represent that you have the authority to do so and to permit us to use the information in accordance with this Privacy Policy.</p>\r\n\r\n<p>You, while providing your personal information over the Platform or any partner platforms or establishments, consent to us (including our other corporate entities, affiliates, lending partners, technology partners, marketing channels, business partners, and other third parties) to contact you through SMS, instant messaging apps, call and/or e-mail for the purposes specified in this Privacy Policy.</p>\r\n\r\n<p><strong>12. Changes to this Privacy Policy</strong></p>\r\n\r\n<p>Please check our Privacy Policy periodically for changes. We may update this Privacy Policy to reflect changes to our information practices. We will alert you to significant changes by posting the date our policy got last updated, placing a notice on our Platform, or by sending you an email when we are required to do so by applicable law.</p>\r\n\r\n<p>&nbsp;</p>', '2021-01-20 17:18:12', '2021-05-25 11:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prescription` varchar(200) NOT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `user_id`, `prescription`, `attachment`, `doctor`, `date`) VALUES
(1, 31, 'Prescription 1', NULL, 'Dr. Ruby Perrin', '2021-03-25'),
(2, 18, 'note.', NULL, 'shailendra', '2021-03-02'),
(3, 18, 'note.hghjg', NULL, 'shailendra', '2021-03-02'),
(4, 25, 'note:-take two paracetamol and take rest.', NULL, 'Doctor', '2021-04-12'),
(5, 25, 'note. take care of self', NULL, 'Doctor', '2021-04-12'),
(6, 25, 'note', NULL, 'Doctor', '2021-04-12'),
(7, 25, 'note.', NULL, 'Doctor', '2021-04-13'),
(8, 30, 'note.hjghj', NULL, 'Doctor', '2021-04-13'),
(9, 30, 'take care of your self', NULL, 'Doctor', '2021-04-14'),
(10, 59, 'take paracetalmol and take rest', NULL, 'Doctor', '2021-04-28'),
(11, 59, 'note.take rest as much as possible', NULL, 'Doctor', '2021-04-28'),
(12, 59, 'booking', 'baby-bath-duo.jpg', 'Doctor', '2021-06-21'),
(13, 59, 'booking', '71wru17ZNjL._SX679_.jpg', 'Doctor', '2021-06-21'),
(14, 59, 'booking', '71wru17ZNjL._SX679_.jpg', 'Doctor', '2021-06-21'),
(15, 59, 'booking', 'anti_hair_fall_spa_kit_with_ingredients.jpg', 'Doctor', '2021-06-21'),
(16, 126, 'note.\r\n\r\nTesting', 'mob_app (1).gif', 'Testdoctor', '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `procommentreplies`
--

CREATE TABLE `procommentreplies` (
  `id` int(100) NOT NULL,
  `comment_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `procommentreplies`
--

INSERT INTO `procommentreplies` (`id`, `comment_id`, `product_id`, `name`, `msg`, `created_at`, `updated_at`) VALUES
(1, 3, 22, 'Admin', 'yes good product', '2021-05-05 17:12:52', '2021-05-05 17:12:52'),
(2, 3, 22, 'Patient', 'This rich ayurvedic oil is specially formulated for muscular and joint pain.', '2021-05-06 13:46:30', '2021-05-06 13:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `procomments`
--

CREATE TABLE `procomments` (
  `id` int(100) NOT NULL,
  `product_id` int(100) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rating` enum('0','1','2','3','4','5') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `procomments`
--

INSERT INTO `procomments` (`id`, `product_id`, `name`, `msg`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'This rich ayurvedic oil is specially formulated for muscular and joint pain. Infused with the healing benefits of Arnica. Prepared with more than 88 ayurvedic herbs and pure essential oils,it has anti- inflammatory properties that help to', '5', '2021-05-05 16:07:47', '2021-05-05 16:07:47'),
(2, 1, 'Admin', 'This rich ayurvedic oil is specially formulated for muscular and joint pain. Infused with the healing benefits of Arnica. Prepared with more than 88 ayurvedic herbs and pure essential oils,it has anti- inflammatory properties that help to', '4', '2021-05-05 16:21:17', '2021-05-05 16:21:17'),
(3, 22, 'Admin', 'This rich ayurvedic oil is specially formulated for muscular and joint pain. Infused with the healing benefits of Arnica. Prepared with more than 88 ayurvedic herbs and pure essential oils,it has anti- inflammatory properties that help to', '5', '2021-05-05 16:53:03', '2021-05-05 16:53:03'),
(4, 22, 'Patient', 'Helps to give relief from arthritic and rheumatic pain joint, discomfort muscle and ligament strains, damaged or torn tissue', '3', '2021-05-06 17:08:33', '2021-05-06 17:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `thumb_id` varchar(10) DEFAULT NULL,
  `min_qty` varchar(255) DEFAULT NULL,
  `current_stock` varchar(100) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `tax_type` varchar(100) NOT NULL,
  `tax` double NOT NULL DEFAULT 0,
  `tax_price` double NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `purchase_price` varchar(100) DEFAULT NULL,
  `variation` varchar(100) DEFAULT NULL,
  `attributes` varchar(40) DEFAULT NULL,
  `product_details_featured` varchar(40) DEFAULT NULL,
  `published` varchar(40) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `saving` varchar(255) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `no_of_seller` varchar(10) DEFAULT NULL,
  `short_details` varchar(255) DEFAULT NULL,
  `inventory_type` enum('packet','unit') DEFAULT NULL,
  `meta_title` varchar(40) DEFAULT NULL,
  `meta_description` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `stock` enum('1','0') DEFAULT '1',
  `upload_image` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `view` int(11) DEFAULT NULL,
  `is_show` enum('1','0') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `thumb_id`, `min_qty`, `current_stock`, `details`, `tax_type`, `tax`, `tax_price`, `selling_price`, `purchase_price`, `variation`, `attributes`, `product_details_featured`, `published`, `unit`, `saving`, `discount`, `weight`, `no_of_seller`, `short_details`, `inventory_type`, `meta_title`, `meta_description`, `slug`, `stock`, `upload_image`, `user_id`, `status`, `view`, `is_show`, `created_at`, `updated_at`) VALUES
(1, 24, NULL, 'Toothbrush', NULL, NULL, '500', '<p>qwertyrew</p>', 'GST', 18, 18, '100', '100', NULL, NULL, NULL, NULL, 'kg', '0', '1.0', '1', NULL, 'aaa', NULL, NULL, NULL, 'toothbrush', '1', 'product_1640158354.png', 1, '1', NULL, '1', '2021-12-22 07:32:34', '2021-12-22 07:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'Wrty', 'dfghg@gmail.com', 2147483647, '2021-03-30 10:49:55', '2021-03-30 10:49:55'),
(2, 'Rtyuo', 'rtyuo45@gmail.com', 786456785, '2021-03-30 10:55:14', '2021-03-30 10:55:14'),
(3, 'Rohnit', 'patient@gmail.com', 2147483647, '2021-04-10 13:31:28', '2021-04-10 13:31:28'),
(4, 'Rohit singh', 'patient@gmail.com', 2147483647, '2021-04-10 13:32:12', '2021-04-10 13:32:12'),
(5, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 2147483647, '2021-04-14 16:42:18', '2021-04-14 16:42:18'),
(6, 'Prateek Sood', 'satyammegamart@gmail.com', 2147483647, '2021-05-07 11:42:43', '2021-05-07 11:42:43'),
(7, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 2147483647, '2021-05-16 06:01:05', '2021-05-16 06:01:05'),
(8, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 2147483647, '2021-05-20 10:46:29', '2021-05-20 10:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `id` int(255) NOT NULL,
  `commentId` int(255) DEFAULT NULL,
  `typeId` varchar(255) DEFAULT NULL,
  `userId` int(255) DEFAULT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replys`
--

INSERT INTO `replys` (`id`, `commentId`, `typeId`, `userId`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 'review', 31, 'jhjkghjgjh', 1, '2021-02-25 17:58:16', '2021-02-25 19:28:16'),
(2, 20, 'review', 31, 'hghjghjgfgd', 1, '2021-02-25 17:58:16', '2021-02-25 19:28:16'),
(3, NULL, 'review', 31, 'dfsd', 1, '2021-03-03 12:27:31', '2021-03-03 13:57:31'),
(4, 1, 'review', 31, 'dfsd', 1, '2021-03-03 12:28:26', '2021-03-03 13:58:26'),
(5, 1, 'review', 31, 'jhjk', 1, '2021-03-03 12:28:50', '2021-03-03 13:58:50'),
(6, 1, 'review', 31, 'sgsdg', 1, '2021-03-03 12:29:25', '2021-03-03 13:59:25'),
(7, NULL, 'review', 30, 'hgjhg', 1, '2021-03-20 08:44:06', '2021-03-20 10:14:06'),
(8, NULL, 'review', 30, 'ghhjg', 1, '2021-03-20 08:44:37', '2021-03-20 10:14:37'),
(9, NULL, 'review', 30, 'kjljkl', 1, '2021-03-26 04:50:30', '2021-03-26 06:20:30'),
(10, NULL, 'review', 30, 'ji', 1, '2021-04-13 04:58:35', '2021-04-13 11:58:35'),
(11, NULL, 'review', 30, 'hi', 1, '2021-04-13 04:59:05', '2021-04-13 11:59:05'),
(12, NULL, 'review', 30, 'hi', 1, '2021-04-13 05:06:50', '2021-04-13 12:06:50'),
(13, NULL, 'review', 30, 'gog', 1, '2021-04-13 05:10:49', '2021-04-13 12:10:49'),
(14, 41, 'blog', 48, 'hi', 1, '2021-04-15 05:19:50', '2021-04-15 12:19:50'),
(15, NULL, 'review', 59, 'hi', 1, '2021-04-23 07:38:15', '2021-04-23 14:38:15'),
(16, NULL, 'review', 59, 'fghghjbh your not doing well', 1, '2021-04-28 11:40:08', '2021-04-28 18:40:08'),
(17, NULL, 'review', 72, NULL, 1, '2021-05-03 05:32:10', '2021-05-03 12:32:10'),
(18, NULL, 'review', 1, NULL, 1, '2021-05-03 10:49:49', '2021-05-03 17:49:49'),
(19, NULL, 'review', 46, NULL, 1, '2021-05-26 12:38:38', '2021-05-26 19:38:38'),
(20, NULL, 'review', 46, NULL, 1, '2021-05-26 12:39:15', '2021-05-26 19:39:15'),
(21, NULL, 'review', 51, NULL, 1, '2021-06-23 08:52:10', '2021-06-23 15:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `scheduletimes`
--

CREATE TABLE `scheduletimes` (
  `id` int(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `adate` date DEFAULT NULL,
  `weekday` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') DEFAULT 'sunday',
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduletimes`
--

INSERT INTO `scheduletimes` (`id`, `user_type`, `user_id`, `adate`, `weekday`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(2, 'doctor', 1, '0000-00-00', 'tuesday', '12.30 am', '1.00 am', '2021-02-25 12:10:49', '2021-02-25 13:40:49'),
(3, 'doctor', 1, '0000-00-00', 'monday', '12.00 am', '1.30 am', '2021-02-25 12:25:44', '2021-02-25 13:55:44'),
(4, 'doctor', 4, '0000-00-00', 'tuesday', '12.30 am', '1.00 am', '2021-02-25 12:28:51', '2021-02-25 13:58:51'),
(6, 'hospital', 31, '0000-00-00', 'monday', '1.00 am', '1.00 am', '2021-02-25 12:54:12', '2021-02-25 14:24:12'),
(7, 'doctor', 3, '0000-00-00', 'tuesday', '12.00 am', '1.30 am', '2021-02-26 07:04:49', '2021-02-26 08:34:49'),
(8, 'hospital', 3, '0000-00-00', 'monday', '12.30 am', '1.00 am', '2021-03-05 09:09:10', '2021-03-05 10:39:10'),
(9, 'hospital', 3, '0000-00-00', 'tuesday', '12.30 am', '1.00 am', '2021-03-05 09:09:57', '2021-03-05 10:39:57'),
(11, 'diagonostics', 27, '0000-00-00', 'monday', '2.00 am', '12.30 am', '2021-04-02 09:14:23', '2021-04-02 10:44:23'),
(12, 'hospital', 28, '0000-00-00', 'tuesday', '3.00 am', '1.30 am', '2021-04-02 09:17:39', '2021-04-02 10:47:39'),
(13, 'hospital', 28, '0000-00-00', 'monday', '15:06', '15:06', '2021-04-02 09:34:59', '2021-04-02 11:04:59'),
(14, 'hospital', 28, '0000-00-00', 'friday', '15:07', '15:08', '2021-04-02 09:35:37', '2021-04-02 11:05:37'),
(17, 'diagnostic', 54, '0000-00-00', 'sunday', '08:00', '08:30', '2021-04-14 06:46:39', '2021-04-14 13:46:39'),
(18, 'diagnostic', 54, '0000-00-00', 'sunday', '08:30', '09:00', '2021-04-14 06:49:28', '2021-04-14 13:49:28'),
(19, 'diagnostic', 54, '0000-00-00', 'sunday', '09:00', '09:31', '2021-04-14 06:50:13', '2021-04-14 13:50:13'),
(20, 'diagnostic', 54, '0000-00-00', 'monday', '15:30', '16:00', '2021-04-14 06:51:55', '2021-04-14 13:51:55'),
(21, 'doctor', 55, '0000-00-00', 'sunday', '18:31', '19:00', '2021-04-14 09:41:19', '2021-04-14 16:41:19'),
(35, 'admin', 1, '2021-05-25', 'tuesday', '16:00', '16:15', '2021-05-25 10:17:22', '2021-05-25 17:17:22'),
(37, 'doctor', 25, '2021-05-31', 'monday', '09:00', '18:00', '2021-05-30 12:47:04', '2021-05-30 19:47:04'),
(39, 'doctor', 25, '2021-06-01', 'tuesday', '09:18', '18:00', '2021-05-30 12:48:56', '2021-05-30 19:48:56'),
(40, 'doctor', 25, '2021-06-02', 'wednesday', '09:19', '18:19', '2021-05-30 12:49:33', '2021-05-30 19:49:33'),
(41, 'doctor', 25, '2021-06-04', 'friday', '09:20', '18:15', '2021-05-30 12:51:00', '2021-05-30 19:51:00'),
(42, 'admin', 1, '2021-06-10', 'thursday', '20:00', '20:01', '2021-06-02 12:31:07', '2021-06-02 19:31:07'),
(43, 'doctor', 25, '2021-06-17', 'thursday', '04:29', '05:29', '2021-06-17 05:00:02', '2021-06-17 12:00:02'),
(44, 'doctor', 25, '2021-06-18', 'friday', '02:30', '03:30', '2021-06-17 05:00:41', '2021-06-17 12:00:41'),
(45, 'doctor', 25, '2021-06-19', 'saturday', '02:34', '03:36', '2021-06-17 05:01:09', '2021-06-17 12:01:09'),
(46, 'doctor', 25, '2021-06-19', 'saturday', '02:34', '03:36', '2021-06-17 05:01:12', '2021-06-17 12:01:12'),
(47, 'doctor', 25, '2021-06-30', 'wednesday', '03:31', '04:31', '2021-06-17 05:01:38', '2021-06-17 12:01:38'),
(51, 'doctor', 25, '2021-06-23', 'wednesday', '19:24', '20:24', '2021-06-18 11:54:41', '2021-06-18 18:54:41'),
(53, 'doctor', 25, NULL, 'friday', '10:00', '11:00', '2021-06-21 05:23:10', '2021-06-21 12:23:10'),
(54, 'doctor', 119, NULL, 'sunday', NULL, NULL, '2021-06-23 12:28:11', '2021-06-23 19:28:11'),
(55, 'doctor', 119, NULL, 'tuesday', NULL, NULL, '2021-06-23 12:29:32', '2021-06-23 19:29:32'),
(56, 'doctor', 119, NULL, 'monday', NULL, NULL, '2021-06-24 09:00:41', '2021-06-24 16:00:41'),
(57, 'doctor', 121, NULL, 'sunday', '19:05', '22:05', '2021-06-24 10:35:17', '2021-06-24 17:35:17'),
(58, 'doctor', 121, NULL, 'monday', '09:05', '20:05', '2021-06-24 10:35:57', '2021-06-24 17:35:57'),
(59, 'doctor', 123, NULL, 'monday', '18:39', '20:36', '2021-06-24 13:06:35', '2021-06-24 20:06:35'),
(60, 'doctor', 123, NULL, 'wednesday', '11:36', '00:36', '2021-06-24 13:07:02', '2021-06-24 20:07:02'),
(61, 'doctor', 124, NULL, 'sunday', '09:00', '10:00', '2021-06-25 06:16:54', '2021-06-25 13:16:54'),
(63, 'doctor', 124, NULL, 'monday', '09:30', '10:00', '2021-06-25 06:18:08', '2021-06-25 13:18:08'),
(64, 'doctor', 124, NULL, 'tuesday', '10:00', '11:00', '2021-06-25 06:18:39', '2021-06-25 13:18:39'),
(65, 'doctor', 124, NULL, 'wednesday', '11:00', '12:00', '2021-06-25 06:19:35', '2021-06-25 13:19:35'),
(66, 'doctor', 124, NULL, 'friday', '11:30', '13:00', '2021-06-25 06:20:10', '2021-06-25 13:20:10'),
(67, 'doctor', 125, NULL, 'monday', '12:00', '14:00', '2021-06-25 08:11:01', '2021-06-25 15:11:01'),
(68, 'doctor', 125, NULL, 'tuesday', '13:00', '16:00', '2021-06-25 08:12:18', '2021-06-25 15:12:18'),
(69, 'admin', 1, NULL, 'monday', '09:00', '17:00', '2021-07-01 11:43:13', '2021-07-01 18:43:13'),
(70, 'doctor', 129, NULL, 'sunday', '09:00', '18:00', '2021-07-16 06:40:51', '2021-07-16 13:40:51'),
(71, 'doctor', 129, NULL, 'monday', '09:00', '18:00', '2021-07-16 06:42:58', '2021-07-16 13:42:58'),
(72, 'doctor', 129, NULL, 'tuesday', '09:00', '18:00', '2021-07-16 06:44:08', '2021-07-16 13:44:08'),
(73, 'doctor', 129, NULL, 'wednesday', '09:00', '18:00', '2021-07-16 06:45:01', '2021-07-16 13:45:01'),
(74, 'doctor', 129, NULL, 'friday', '09:00', '19:00', '2021-07-16 06:46:16', '2021-07-16 13:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Services', '<h2><span style=\"font-size:14px\">eCommerce business is on the rise globally. Several companies have seen its growth from the sidelines, wondering if an online business strategy is right for their business. BrandLoom&rsquo;s eCommerce Development Services is the answer to this very question.</span></h2>\r\n\r\n<blockquote>\r\n<p><span style=\"font-size:14px\">Brands will increasingly handle their own e-commerce and rely less and less on local distribution partners. Why should they give away their profit margins?&nbsp;<a href=\"https://en.wikipedia.org/wiki/Natalie_Massenet\" rel=\"noopener\" target=\"_blank\">Natalie Massenet</a></span></p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:14px\">Our team of experienced eCommerce development experts will help guide your online entry strategy and decide which marketplaces are right for you to sell your products and reach a more extensive array of customers.</span></li>\r\n	<li><span style=\"font-size:14px\">We have seen that businesses hesitate to sell online due to the lack of understanding and expertise to manage eCommerce operations. BrandLoom as an eCommerce Development Company will help you to make informed business decisions with a go-to-market strategy to succeed online.</span></li>\r\n	<li><span style=\"font-size:14px\">Our eCommerce developments services team will provide you with customer insights, merchandising strategy, technology, supply chain and digital marketing strategy that will help you become a leading eCommerce player in your industry.</span></li>\r\n	<li><span style=\"font-size:14px\">BrandLoom. The Best eCommerce Development Company in India</span></li>\r\n	<li><span style=\"font-size:14px\">Take advantage of our affordable eCommerce Development Services and end-to-end Fully Managed eCommerce Solutions. Our e commerce services and ecommerce solutions enable you to sell directly to your consumers around the world through your brand store and marketplaces. BrandLoom will enable you to build ecommerce expertise through comprehensive eCommerce Consulting Services and the implementation of the eCommerce strategy.</span></li>\r\n</ol>\r\n\r\n<h3><span style=\"font-size:14px\">How our e Commerce Service &amp; Solutions support your Business?</span></h3>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:14px\">At BrandLoom Consulting, we enable Startups, brands and retailers to start selling their products online directly to consumers. We have developed a unique e Commerce Services ecosystem. Our ecosystem enables brands/retailers to do so using their own Exclusive Online Brand Outlet (EOBO) concept and also on marketplaces.</span></li>\r\n	<li><span style=\"font-size:14px\">BrandLoom Consulting will help you build, operate and transfer the eCommerce Business Module that is future ready.</span></li>\r\n</ol>', '2021-01-20 17:19:08', '2021-01-20 12:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Urology', 'specialities_1615543552.png', '2021-03-12 10:05:52', '2021-03-12 10:05:52'),
(2, 'Neurology', 'specialities_1615543678.png', '2021-03-12 10:07:58', '2021-03-12 10:07:58'),
(3, 'Orthopedic', 'specialities_1615543721.png', '2021-03-12 10:08:41', '2021-03-12 10:08:41'),
(4, 'Cardiologist', 'specialities_1615543755.png', '2021-03-12 10:09:15', '2021-03-12 10:09:15'),
(5, 'Dentist', 'specialities_1615543789.png', '2021-03-12 10:09:49', '2021-03-12 10:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `img`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 'New Subcat', 'new-subcat', '', '', '1', '2021-12-21 16:35:13', '2021-12-21 16:35:13'),
(2, 1, 'Trial Subcategory11', 'trial-subcat', '', '', '1', '2021-12-21 16:35:13', '2021-12-22 12:25:14'),
(3, 28, 'aaaaa', 'aaa', 'categories_1640240406.png', 'banner_1640240406.png', '1', '2021-12-23 06:20:06', '2021-12-23 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_payments`
--

CREATE TABLE `subscription_payments` (
  `id` int(100) NOT NULL,
  `u_id` int(100) DEFAULT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_mobile` int(10) DEFAULT NULL,
  `u_address` varchar(200) DEFAULT NULL,
  `partner` varchar(100) DEFAULT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `plan_id` int(100) DEFAULT NULL,
  `splan_name` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `p_price` int(100) DEFAULT NULL,
  `p_tax` double DEFAULT NULL,
  `p_tax_price` double DEFAULT NULL,
  `p_total_price` double DEFAULT NULL,
  `p_currency` varchar(100) DEFAULT NULL,
  `vaild` double DEFAULT NULL,
  `payment_status` enum('completed','pending') DEFAULT 'pending',
  `status` enum('active','expired') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_payments`
--

INSERT INTO `subscription_payments` (`id`, `u_id`, `u_name`, `u_email`, `u_mobile`, `u_address`, `partner`, `invoice_no`, `plan_id`, `splan_name`, `payment_method`, `p_price`, `p_tax`, `p_tax_price`, `p_total_price`, `p_currency`, `vaild`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(70, 25, 'Doctor', 'doctor@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'doctor', 'INV10768347', 2, 'Plan 1', 'paytm', 5000, 18, 900, 5900, '₹', 6, 'completed', 'active', '2020-05-20 06:18:43', '2021-06-18 08:44:21'),
(71, 1, 'Admin', 'admin@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'admin', 'INV107319774', 4, 'Plan1', 'paytm', 8000, 18, 1440, 9440, '₹', 6, 'completed', 'active', '2021-05-20 06:35:23', '2021-06-18 08:44:28'),
(72, 25, 'Doctor', 'doctor@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'doctor', 'INV113629390', 7, 'Plan 5', 'paytm', 8760, 18, 1576.8, 10336.8, '₹', 6, 'completed', 'active', '2021-05-20 06:54:24', '2021-06-18 08:44:36'),
(73, 28, 'Hospital', 'hospital@gmail.com', 2147483647, 'D-56,sector-56,Noida,UP,india', 'hospital', 'INV101159833', 5, 'Plan 2', 'paytm', 5600, 18, 1008, 6608, '₹', 12, 'completed', 'active', '2021-05-20 07:01:10', '2021-06-18 08:44:42'),
(74, 1, 'Admin', 'admin@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'admin', 'INV11445747', 7, 'Plan 5', 'paytm', 8760, 18, 1576.8, 10336.8, '₹', 1, 'pending', '', '2021-05-27 11:17:35', '2021-05-27 11:17:35'),
(75, 1, 'Admin', 'admin@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'admin', 'INV117221217', 2, 'Plan 1', 'paytm', 5000, 18, 900, 5900, '₹', 1, 'pending', '', '2021-05-27 11:49:41', '2021-05-27 11:49:41'),
(77, 1, 'Admin', 'admin@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'admin', 'INV104654963', 8, 'Silver pack', 'paytm', 0, 0, 0, 0, '₹', 0, 'pending', '', '2021-06-01 06:14:37', '2021-06-01 06:14:37'),
(79, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 2147483647, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'admin', 'INV108264286', 9, 'Plan 5z', 'paytm', 700, 5, 35, 735, '₹', 1, 'pending', '', '2021-06-02 12:14:10', '2021-06-02 12:14:10'),
(80, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 2147483647, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'admin', 'INV111585922', 9, 'Plan 5z', 'paytm', 700, 5, 35, 735, '₹', 1, 'pending', '', '2021-06-04 10:20:21', '2021-06-04 10:20:21'),
(81, 38, 'Doctor', 'jukrg56@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'doctor', 'INV104870273', 2, 'Plan 1', 'paytm', 5000, 18, 900, 5900, '₹', 1, 'completed', 'active', '2021-06-07 08:00:51', '2021-06-07 08:00:51'),
(82, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 2147483647, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'admin', 'INV115155984', 9, 'Plan 5z', 'paytm', 700, 5, 35, 735, '₹', 1, 'completed', 'active', '2021-05-16 09:17:18', '2021-06-18 08:44:59'),
(83, 119, 'Nitty', 'nitty@gmail.com', 2147483647, 'G-130, Ground Floor, Sector 63, Noida', 'doctor', 'INV115184772', 8, 'Silver pack', 'paytm', 0, 0, 0, 0, '₹', 3, 'completed', 'active', '2021-06-23 12:35:28', '2021-06-23 12:35:28'),
(84, 119, 'Nitty', 'nitty@gmail.com', 2147483647, 'G-130, Ground Floor, Sector 63, Noida', 'doctor', 'INV107176777', 8, 'Silver pack', 'paytm', 0, 0, 0, 0, '₹', 3, 'completed', 'active', '2021-06-23 12:39:56', '2021-06-23 12:39:56'),
(85, 1, 'Admin - Social Vaidya', 'admin@gmail.com', 2147483647, 'C/O-MUNNA KUMAR SAH, VILLLAGE - REPURA', 'admin', 'INV104996638', 8, 'Silver pack', 'paytm', 0, 0, 0, 0, '₹', 3, 'pending', 'active', '2021-06-23 13:51:58', '2021-06-23 13:51:58'),
(86, 25, 'Doctor', 'doctor@gmail.com', 2147483647, 'B-56,sector-56,Noida,UP,india', 'doctor', 'INV119191727', 8, 'Silver pack', 'paytm', 0, 0, 0, 0, '₹', 3, 'pending', 'active', '2021-06-23 13:53:22', '2021-06-23 13:53:22'),
(92, 124, 'Testdoctor', 'anuj.s@aanaxagorasr.com', 2147483647, NULL, 'doctor', 'INV104027983', 8, 'Silver pack', 'offer', 0, 0, 0, 0, '₹', 3, 'completed', 'active', '2021-06-24 11:15:47', '2021-06-24 11:15:47'),
(93, 125, 'Nitty', 'nitty@gmail.com', 2147483647, NULL, 'doctor', 'INV104781509', 8, 'Silver pack', 'offer', 0, 0, 0, 0, '₹', 3, 'completed', 'active', '2021-06-25 08:10:09', '2021-06-25 08:10:09'),
(94, 48, 'Deepak Kumar Sah', 'iit2013063@gmail.com', 2147483647, NULL, 'doctor', 'INV115893088', 2, 'Package for Doctors', 'paytm', 500, 18, 900, 5900, '₹', 3, 'pending', 'active', '2021-07-24 13:40:28', '2021-07-24 13:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(200) NOT NULL,
  `buspart_id` int(100) NOT NULL,
  `plan_name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `tax` double NOT NULL,
  `tax_price` double NOT NULL,
  `total_price` double NOT NULL,
  `currency` varchar(100) NOT NULL,
  `vaild` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `status` enum('1','0') NOT NULL,
  `img` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `buspart_id`, `plan_name`, `price`, `tax`, `tax_price`, `total_price`, `currency`, `vaild`, `details`, `status`, `img`, `created_at`, `updated_at`) VALUES
(2, 1, 'Package for Doctors', 500, 18, 900, 5900, '₹', '3', '<p>For Doctor</p>\r\n\r\n<ul>\r\n	<li>Advanced calendar</li>\r\n	<li>Professional billing</li>\r\n	<li>Patient charting</li>\r\n	<li>Unlimited appointment confirmation, reminder, and follow-up SMS</li>\r\n	<li>SMS center</li>\r\n	<li>Supports&nbsp;local languages</li>\r\n	<li>Feedback collection</li>\r\n	<li>Share records with your patients</li>\r\n	<li>My Doctors</li>\r\n	<li>Follow-up consult</li>\r\n	<li>Language customization at a patient level</li>\r\n	<li><strong>Basic</strong>&nbsp;reports</li>\r\n	<li>(<strong>25</strong>&nbsp;transactions/ month @&nbsp;<strong>2</strong>%)</li>\r\n	<li>Treatment communications</li>\r\n</ul>', '1', 'subscriptionplans_1615268910.jpg', '2021-03-09 05:48:30', '2021-07-18 08:56:50'),
(3, 2, 'Plan 6', 7000, 18, 1260, 8260, '₹', '6', '<p>A&nbsp;<em>blood bank</em>&nbsp;is a center where blood gathered as a result of&nbsp;<em>blood donation</em>&nbsp;is stored and preserved for later use in blood transfusion. The term &quot;<em>blood bank</em>&quot;&nbsp;...</p>', '1', 'subscriptionplans_1615270681.jpg', '2021-03-09 06:18:01', '2021-06-17 10:24:39'),
(4, 3, 'Plan1', 8000, 18, 1440, 9440, '₹', '3', '<p><em>Diagnostic Centres</em>&nbsp;in Noida &middot; Thyrocare Noida &middot; Covid-19 RT-PCR Test in Noida @ Thyrocare &middot; Dr Lal PathLabs, SECTOR 75 &middot; Modern Pathology Laboratories &middot;</p>', '1', 'subscriptionplans_1615270823.jpg', '2021-03-09 06:20:23', '2021-06-17 10:24:21'),
(5, 4, 'Plan 2', 5600, 18, 1008, 6608, '₹', '6', '<p>Hospitals matter to people and often mark central points in their lives. They also matter to health systems by being instrumental for care coordination and&nbsp;...</p>', '1', 'subscriptionplans_1615271004.jpg', '2021-03-09 06:23:24', '2021-06-17 10:24:03'),
(6, 5, 'Plan 4', 6790, 18, 1222.2, 8012.2, '₹', '1', '<p>PharmEasy is one of India&#39;s most trusted online&nbsp;<em>pharmacy</em>&nbsp;&amp; medical stores offering pharmaceutical and healthcare products at a FLAT 18% OFF*. Used by 5M+&nbsp;.</p>', '1', 'subscriptionplans_1615271163.jpg', '2021-03-09 06:26:03', '2021-06-17 10:23:41'),
(7, 1, 'Plan 5', 8760, 18, 1576.8, 10336.8, '₹', '12', '<p>What do you call&nbsp;<em>doctors</em>&nbsp;who specialize in different types of diseases or conditions? How can you know you are going to the right specialist for&nbsp;...</p>', '1', 'subscriptionplans_1615271279.jpg', '2021-03-09 06:27:59', '2021-06-17 10:23:23'),
(8, 1, 'Silver pack', 0, 0, 0, 0, '₹', '3', '<p>free plan to all first 60 doctor</p>', '1', 'subscriptionplans_1618568228.jpg', '2021-04-16 10:17:08', '2021-06-17 10:23:05'),
(9, 1, 'Plan 5z', 700, 5, 35, 735, '₹', '1', '<p>Plan 5z</p>', '1', 'subscriptionplans_1622635826.jpg', '2021-06-02 12:10:26', '2021-06-17 10:22:43'),
(10, 2, 'Plan 21', 6780, 8, 542.4, 7322.4, '₹', '6', '<p>Plan21 for 3 month</p>', '1', 'subscriptionplans_1623925161.jpg', '2021-06-17 10:19:21', '2021-06-17 10:22:18'),
(11, 6, 'Doctor Appointment', 300, 18, 54, 354, '₹', '1', '<p>Patients can book Doctor&#39;s Appointment through this package.</p>', '1', 'subscriptionplans_1626599858.jpg', '2021-07-18 09:17:38', '2021-07-18 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `trial_categories`
--

CREATE TABLE `trial_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trial_categories`
--

INSERT INTO `trial_categories` (`id`, `user_id`, `name`, `img`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trial Category1', 'categories_1640174227.png', 'banner_1640179070.png', '1', '2021-12-22 11:57:07', '2021-12-22 13:17:50'),
(2, 1, 'New trial', 'categories_1640178847.png', 'banner_1640178847.png', '1', '2021-12-22 13:14:07', '2021-12-22 13:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `trial_products`
--

CREATE TABLE `trial_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `upload_image` varchar(255) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `tios_points` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `extra_details` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trial_products`
--

INSERT INTO `trial_products` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `upload_image`, `purchase_price`, `selling_price`, `quantity`, `tios_points`, `weight`, `details`, `extra_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 28, 3, 'Cooking Equipment', 'cooking-equipment', 'product_1640264135.png', '78.00', '90.00', '8', '9', '25', 'chg', '<p>tfgdg</p>', '1', '2021-12-23 12:55:35', '2021-12-23 12:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `trial_subcategories`
--

CREATE TABLE `trial_subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trial_subcategories`
--

INSERT INTO `trial_subcategories` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Trial Subcategory', 'trial-subcat', '1', '2021-12-22 12:22:43', '2021-12-22 12:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_type` enum('admin','customer','seller') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `mobile_otp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_line` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_business` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `status`, `user_type`, `mobile_otp`, `business_title`, `tag_line`, `about_business`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Admin - Hygiene', 'admin@gmail.com', '$2y$10$q.gv0ltVFwHb..Se/Myrhe793C/bWMV0DN7ZFLbIi6fFm7IdLIMJS', '', '1', 'admin', '0', NULL, NULL, NULL, NULL, NULL, '2021-06-02 16:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `webs`
--

CREATE TABLE `webs` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email2` varchar(200) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `fb` varchar(500) NOT NULL DEFAULT 'https://www.facebook.com/',
  `whatsapp` bigint(20) NOT NULL,
  `youtube` varchar(500) NOT NULL DEFAULT 'https://www.youtube.com/',
  `instagram` varchar(500) NOT NULL DEFAULT 'https://www.instagram.com/',
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `gst` varchar(100) NOT NULL,
  `cin` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `webs`
--

INSERT INTO `webs` (`id`, `name`, `url`, `logo`, `mobile`, `email`, `email2`, `mobile2`, `address`, `fb`, `whatsapp`, `youtube`, `instagram`, `twitter`, `linkedin`, `skype`, `gst`, `cin`, `created_at`, `updated_at`) VALUES
(1, 'Thehygieneherbs', 'www.tiosworld.com', 'logo_1640089339.png', '9999999999', 'contact@tiosworld.com', 'contact@tiosworld.com', '9999999999', 'Noida', 'https://www.facebook.com/tiosworld', 9999999999, 'https://www.youtube.com/c/tiosworld', 'http://www.instagram,com/tiosworld', 'https://twitter.com/tiosworld', 'http://www.linkedin.com/company/tiosworld', 'tiosworld', 'sbsbb BHs', '08765xbx bxb n', '2020-06-28 07:39:21', '2021-12-21 16:22:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `askquestions`
--
ALTER TABLE `askquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodbank_requests`
--
ALTER TABLE `bloodbank_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_appoint`
--
ALTER TABLE `book_appoint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_partners`
--
ALTER TABLE `business_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorprofiles`
--
ALTER TABLE `doctorprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_reviews`
--
ALTER TABLE `doctor_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homenotifications`
--
ALTER TABLE `homenotifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slides`
--
ALTER TABLE `home_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procommentreplies`
--
ALTER TABLE `procommentreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procomments`
--
ALTER TABLE `procomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduletimes`
--
ALTER TABLE `scheduletimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_payments`
--
ALTER TABLE `subscription_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trial_categories`
--
ALTER TABLE `trial_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trial_products`
--
ALTER TABLE `trial_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trial_subcategories`
--
ALTER TABLE `trial_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webs`
--
ALTER TABLE `webs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `askquestions`
--
ALTER TABLE `askquestions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bloodbank_requests`
--
ALTER TABLE `bloodbank_requests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `book_appoint`
--
ALTER TABLE `book_appoint`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_partners`
--
ALTER TABLE `business_partners`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `doctorprofiles`
--
ALTER TABLE `doctorprofiles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_reviews`
--
ALTER TABLE `doctor_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `homenotifications`
--
ALTER TABLE `homenotifications`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slides`
--
ALTER TABLE `home_slides`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `procommentreplies`
--
ALTER TABLE `procommentreplies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procomments`
--
ALTER TABLE `procomments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scheduletimes`
--
ALTER TABLE `scheduletimes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_payments`
--
ALTER TABLE `subscription_payments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trial_categories`
--
ALTER TABLE `trial_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trial_products`
--
ALTER TABLE `trial_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trial_subcategories`
--
ALTER TABLE `trial_subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `webs`
--
ALTER TABLE `webs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
