-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2022 lúc 01:54 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `movie_theater`
--

-- --------------------------------------------------------

create database movie_theater;
use movie_theater;
--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` varchar(10) NOT NULL,
  `blog_name` varchar(1000) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_name`, `poster`, `content`) VALUES
('BG001', 'Bà Đinh Thị Thanh Hương Nhận Giải Nhà Phát Hành của CineAsia năm 2022', 'blog1.jpg', 'Bà Đinh Thị Thanh Hương, Chủ tịch Điều hành Galaxy Studio; và Phó Chủ tịch của Galaxy Entertainment & Education đã nhận được Giải thưởng “Nhà phát hành của năm” tại Lễ trao giải CineAsia vào Thứ Năm, ngày 8 tháng 12 năm 2022 tại Millennium Hilton ở Bangkok. “Hơn 20 năm qua, bà Hương đã khẳng định mình là người dẫn đầu trong ngành truyền thông và giải trí. Chúng tôi không thể nghĩ ra người nào xứng đáng hơn cho giải thưởng năm nay,” Chủ tịch của Film Expo Group, Ông Robert Sunshine cho biết.Bà Hương hiện đang giữ chức vụ Chủ tịch điều hành của Galaxy Studio, một trong những doanh nghiệp phát hành và chiếu phim tư nhân hàng đầu tại Việt Nam. Bà cũng là Phó Chủ tịch của Galaxy Entertainment & Education. Trong sự nghiệp của mình, bà đã đạt được nhiều thành tựu to lớn như tăng gấp đôi doanh thu trong giai đoạn 2012-2019 và tăng số lượng nhân viên cho công ty lên hơn 1.000 người trên khắp cả nước, cũng như đóng góp vai trò trong thành công của một số bộ phim điện ảnh như: Nụ Hồn Thần Chết, Quả Tim Máu,Tôi Thấy  Hoa Vàng Trên Cỏ Xanh và gần đây nhất là Mắt Biếc, Bố Già, Em Và Trịnh. Nói tới Galaxy, khán giả cũng nghĩ ngay tới hệ thống rạp thân thiện với hiệu quả cao và là nhà phát hành độc quyền cho Sony Pictures, The Walt Disney Studios và một số hãng phim độc lập của khu vực như: Thái Lan, Hàn Quốc, Malaysia… tại Việt Nam.'),
('BG002', 'Avatar Và Những Tựa Phim Bắt Khán Giả Đợi Dài Cổ ', 'blog2.jpg', 'Quá trình để có một cuốn phim hay sẽ như thế nào? Từ bất kỳ ý tưởng bất chợt nào đấy, phải chuyển hóa chúng thành những trang kịch bản hoàn chỉnh. Tiếp đến là tuyển diễn viên, các công đoạn tiền kỳ phải được chuẩn bị đầy đủ. Khi tiến hành quay, bởi có nhiều yếu tố tác động nên thời gian ngắn hay dài là điều không nói trước được. Hoàn tất việc ghi hình thì đến phần hậu kỳ. Đây là lúc mà các cảnh phim được biên tập, chỉnh sửa, thêm vào các hiệu ứng kỹ xảo, hoặc thậm chí là phải quay lại nếu chưa vừa ý. Khâu cuối cùng là lên kế hoạch phát hành, thực hiện chiến lược truyền thông để đưa tác phẩm ra mắt tại rạp chiếu phim. Hầu hết trong từng giai đoạn kể trên, luôn có khả năng phát sinh vấn đề mà không ai lường trước được. Chính điều này dẫn đến sự chậm trễ trong tiến độ hoàn thiện phim. Việc trì hoãn diễn ra trong vài tháng hay có khi lên đến nhiều năm. Không thiếu những cái tên từng trải qua nhiều gian nan trước khi đến với công chúng. Sắp tới là Avatar: The Way Of Water, siêu phẩm của James Cameron phải mất 13 năm ra rạp kể từ phần đầu tiên. Hãy cùng điểm danh những tựa phim từng chịu số phận “ngâm kho” trong lịch sử!'),
('BG003', 'The Dark Knight: Tượng Đài Của Thể Loại Siêu Anh Hùng', 'blog3.jpg', 'Nhắc đến phim siêu anh hùng, khán giả thường nghĩ ngay tới những phim chiếu rạp của Marvel, vụ trụ điện ảnh thành công nhất hiện nay. Dẫu vậy, kể từ khi ra mắt của The Dark Knight, vẫn chưa có một tác phẩm nào về đề tài siêu anh hùng có thể vượt qua. Bộ phim hoàn hảo về mọi mặt từ cốt truyện, diễn xuất, và cả những tên tuổi xuất hiện trong bộ phim.Với sự nổi lên của các dạng phim siêu anh hùng, thành công của nhà Marvel cùng hàng loạt những vũ trụ điện ảnh, đến khi thưởng thức lại The Dark Knight nhiều khán giả mới hiểu tại sao phim lại nhận được nhiều lời khen ngợi đến vậy, một tượng đài không thể soán ngôi, một tác phẩm vượt trên quy chuẩn của siêu anh hùng. The Dark Knight là phần thứ 2 trong bộ 3 phim về Batman của Christopher Nolan, về tổng thể, tác phẩm không đơn thuần chỉ là phim hay về siêu anh hùng cùng những trận đánh với ác nhân xấu xa hay chống lại các sinh vật ngoài vũ trụ, cũng không phải là câu chuyện về những chiến binh sẵn sàng hi sinh để bảo vệ trái đất. The Dark Knight chiếm được sự chú ý đặc biệt của cả các nhà phê bình lẫn khán giả vì tác phẩm viết ra một màn tranh luận về tội ác và công lý, cuộc đấu trí căng thẳng của bên chiến tuyến giữa cái thiện và cái ác. Khán giả được đặt mình vào từng góc khuất và suy nghĩ về những gì các nhân vật phải đối mặt.'),
('BG004', 'Bóc Trứng Phục Sinh Black Panther: Wakanda Forever', 'blog4.jpg', 'Black Panther: Wakanda Forever đang thống trị các rạp chiếu phim toàn thế giới, với doanh thu hơn 355 triệu $ toàn thế giới. Các Stars đã xem phim 1 lần, 2 lần hay 3-4-5 lần? Hãy cùng tìm hiểu những quả trứng Phục Sinh thú vị của phim mới này và check xem bạn đã đoán đúng bao nhiêu? Bản tin thời sự Biên tập viên nổi tiếng Anderson Cooper xuất hiện trên tivi cùng với nhiều tin tức quan trọng. Trong số đó có việc Scott Lang xuất bản hồi kí. Gần như chắc chắn, chi tiết này sẽ xuất hiện ở Ant Man And The Wasp: Quantumania.Khoảnh khắc Nakia xông vào \"sào huyệt\" Talokan và giải thoát cho Shuri, nàng chiến binh đã hạ sát một người. Công chúa tìm cách cứu cô ta bằng chuỗi hạt Kimoyo. Điều này khiến người xem hồi tưởng đến cách cô cứu đặc vụ Everett Ross. Tuy nhiên, vết thương quá nặng nên Shuri đành bó tay. Cái chết ấy đã đẩy mối quan hệ mới chớm nở giữa Shuri và Namor cũng như xứ Wakanda và vùng Talokan vỡ tan tành. Chẳng rõ nếu Shuri cứu người thành công, Wakanda và Talokan có thể đàm phán hòa bình không nhưng chí ít cũng chưa căng thẳng đến mức phát sinh quá nhiều bi kịch về sau.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booked`
--

CREATE TABLE `booked` (
  `id_ticket` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `pre_date` varchar(50) NOT NULL,
  `pre_time` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `seats` varchar(100) NOT NULL,
  `room` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booked`
--

INSERT INTO `booked` (`id_ticket`, `id_user`, `movie_name`, `pre_date`, `pre_time`, `discount`, `seats`, `price`, `room`) VALUES
('TK0001', 'KH0004', 'Bỗng Dưng Trúng Số', '17/11/2022', '09', 'Yêu đức', 'B2,A2,A3,B3', '200000', '01'),
('TK0002', 'KH0005', 'Chiến Binh Báo Đen 2: Wakanda Bất Diệt', '15/11/2022', '10', 'abc', 'D1,D2,C2,C1', '200000', '01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commentary`
--

CREATE TABLE `commentary` (
  `commentary_id` varchar(10) NOT NULL,
  `commentary_name` varchar(1000) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `commentary`
--

INSERT INTO `commentary` (`commentary_id`, `commentary_name`, `poster`, `content`) VALUES
('CM001', '[Review] Black Panther Wakanda Forever: Báo Đen Tìm Được Người Kế Vị Xứng Đáng?', 'cmt1.jpg', 'Doanh thu hơn 1,3 tỷ $ cùng gần chục đề cử Oscar và thắng 3 giải, Black Panther là một trong những tác phẩm xuất sắc nhất thuộc vũ trụ điện ảnh Marvel. Chadwick Boseman cũng nhờ vai diễn T’Challa mà đạt đến đỉnh cao sự nghiệp. Thế nhưng, căn bệnh ung thư nghiệt ngã đột ngột cướp đi anh. Kịch bản đầu tiên của Black Panther: Wakanda Forever mãi mãi chẳng thể lên màn ảnh. Việc ngôi sao qua đời  giữa một dự án dài hơi từng xảy ra ở Hollywood. Cách xử lí đơn giản và hợp lí ở thời điểm Black Panther: Wakanda Forever chưa quay cảnh nào là thay diễn viên. Tuy nhiên, với tất cả sự kính trọng dành cho Chadwick Boseman, Marvel từ chối làm việc đó. Hoàn toàn bất ngờ, đạo diễn kiêm biên kịch Ryan Coogler nhận lấy thử thách nặng ngàn cân – sáng tao phần phim mới giữa cảnh thiếu đi cái tên chủ chốt. May mắn và cũng rất tự hào là anh thành công. Di sản “Black Panther” T’Challa, di sản của Chadwick Boseman đang được giữ gìn và tiếp nối. Wakanda Forever không dài dòng văn tự hay câu giờ để tạo cảm xúc đau buồn. Ngay từ cảnh mở màn, phim buộc khán giả phải trực tiếp đối mặt đau thương. Chỉ trong vài phút đầu tiên, nhà vua T’Challa vĩ đại đã đi xa. Mất Black Panther, đất nước Wakanda đứng trước muôn vàn thử thách. Mất đi người con và người anh tuyệt vời, thông minh, cao cả… Nữ hoàng Ramonda và công chúa Shuri phải chống chọi vơí đủ thứ áp lực để duy trì sự bình yên cho quê nhà. Thế rồi, kẻ thù mới xuất hiện. Hắn mạnh chẳng kém gì Thor và Hulk. Đó là Namor – Thủ lĩnh dân tộc “da xanh” Talokan. Bên cạnh đó, việc là nước duy nhất sở hữu kim loại siêu quý hiếm vibranium khiến Wakanda trở thành miếng mồi ngon trong mắt các nước khác. Hầu hết công chúng sẽ dễ dàng nhận ra trọng tâm về nữ quyền còn nổi bật hơn hình ảnh người da màu đã xây dựng thành công ở phần trước. Đây là chuyện hiển nhiên, khi “đầu tàu” Chadwick Boseman rời đi quá đột ngột và đau đớn. Trọng tâm tôn vinh nền văn hóa, đạo diễn kiêm biên kịch Ryan Coogler tiếp tục chi mạnh tay cho các đại cảnh hoành tráng như đám tang nhà vua T’Challa, cuộc tấn công của tộc Talokan và nhiều trường đoạn mãn nhãn khác... Màu phim trầm, không tươi sáng như đa số “anh em” nhà Marvel. Dài tận 161 phút, nhịp phim Black Panther: Wakanda Forever vẫn nhanh gọn và hấp dẫn. Các tình tiết liền mạch, logic. Tuy ít màn xáp lá cà “máu chảy đầu rơi” nhưng những trường đoạn ấn tượng xuất hiện liên tục. Xây dựng nhân vật trọn vẹn, hiếm cảnh đầu voi đuôi chuột như vài tác phẩm Marvel khác. Từ nữ hoàng Ramonda, công chúa Shuri, M’Baku, Okoye hay thậm chí là đặc vụ CIA Everett Ross đều đủ đất diễn để ghi dấu ấn đậm sâu. Đặc biệt, Riri Williams hay Aneka cũng được khắc họa chỉn chu. Khen Wakanda Forever mà quên nhắc đến nhạc phim là thiếu sót vô cùng lớn. Nhà chế tác Ludwig Göransson từng đứng sau thành công của hàng loạt dự án đình đám tiếp tục chinh phục được những khán giả khó tính nhất với OST gây xúc động mạnh, đủ làm người xem “khóc trôi rạp”.  Chưa hết, Black Panther: Wakanda Forever tiếp tục nối truyền thống Black Panther khi xây dựng tốt phản diện Namor. Tuy rằng, nếu so với Thanos, Killmonger hay Loki, bối cảnh lẫn mục đích của gã Thần Rắn Có Lông Vũ chẳng đặc biệt tẹo nào. Thế nhưng, cách phát triển nhân vật, đặc biệt là đoạn cuối khiến khán giả không thể không vỗ tay khen ngợi. Điểm đáng tiếc hiếm hoi là Namor chưa có câu thoại đỉnh cao như Killmonger.'),
('CM002', '[Review] Black Adam: Cứu Tinh Cho Vũ Trụ DC Mở Rộng?', 'cmt2.jpg', '15 năm kể từ ngày được chọn diễn Black Adam, Dwayne Johnson và các nhà làm phim WB rốt cuộc đã thành công đưa gã mặc đồ đen lên màn ảnh rộng. Teth Adam vốn là một tên nô lệ. May mắn thừa hưởng sức mạnh bảy đại phù thủy ban tặng nhưng gã lỡ phạm sai lầm rồi vùi thây nơi hầm mộ hơn 5000 năm ròng rã. Khi thoát ra, Kahndaq- quê nhà Teth Adam nay là miếng mồi ngon bị lính đánh thuê xâu xé. Nhân dân lầm than, họ cần siêu anh hùng như Batman, Superman hay The Flash… của riêng dân tộc. Thế nhưng, Teth sở hữu sức mạnh vô địch lại chẳng phải anh hùng. Gã là kẻ tội đồ.'),
('CM003', '[Review] Cô Gái Từ Quá Khứ: Đạp Đổ Hoàn Toàn Gái Già Lắm Chiêu?', 'cmt3.jpg', 'Cô Gái Từ Quá Khứ giúp bộ đôi Bảo Nhân - Nam Cito đã từ bỏ thế mạnh là dòng phim chick-flick để thiên về tâm lí nhiều hơn. Tuy sự thay đổi khiến sụt giảm cả trăm tỷ doanh thu, bộ đôi không hề chùn bước. Trái lại, họ mạnh dạn chuyển hẳn sang thể loại thriller. Đang hạnh phúc chuẩn bị đám cưới triệu đô với chàng phi công trẻ xuất thân danh gia vọng tộc Jack (Lê Xuân Tiền), Ms. Q (Ninh Dương Lan Ngọc) liên tiếp bị hăm dọa. Tội ác kinh hoàng phạm phải mười lăm năm trước sắp bị phanh phui, cô hoảng hốt tìm cách trăm phương ngàn cách che giấu. Đúng lúc này, Ms.Q gặp lại Quỳnh Yên (Kaity Nguyễn) – đứa em từ quá khứ.'),
('CM004', '[Review] Cười: Lời Nguyền Sẽ Không Dừng Lại!', 'cmt4.jpg', 'Nếu chẳng may bị ám bởi một lời nguyền ma quái, không thể sống sót quá một tuần thì phải làm thế nào đây? Người xem sẽ có câu trả lời trong gần 2 giờ đồng hồ xuyên suốt Smile, tác phẩm kinh dị mới nhất đến từ Paramount Pictures. Nhân vật chính của phim là Rose, một bác sĩ thuộc chuyên khoa điều trị tâm lý. Cô từng gặp vô số bệnh nhân với những căn bệnh khác nhau liên quan đến thần kinh, mất nhận thức hành vi, hoang tưởng… Dường như chưa từng có bất cứ khó khăn nào làm nản chí nữ bác sĩ này.Tuy nhiên, điều kỳ lạ bắt đầu xảy ra khi nơi Rose làm việc xuất hiện 1 bệnh nhân có biểu hiện kỳ quặc. Người đàn ông này dường như đã trải qua những điều tồi tệ nhất. Việc ông ta liên tục nhắc đến cái chết đã khiến cả Rose lẫn bệnh viện phải tăng cường chăm sóc. Thế nhưng màn kinh hoàng chỉ bắt đầu khi Laura Weaver – người bệnh mới nhất mà Rose tiếp xúc có hành động vượt quá giới hạn. Laura hoảng loạn khi nói những điều tưởng chừng hết sức điên rồ cho Rose nghe, nhưng thứ cô nhận lại chỉ là sự hoài nghi của vị bác sĩ. Bất chợt Laura trở nên mất kiểm soát, nở nụ cười man rợ dành cho Rose và rồi tự sát ngay trước mặt cô. Là nhân chứng của vụ án đẫm máu đã làm cho Rose bị tổn thương và dẫn đến ám ảnh. Cơn ác mộng vẫn chưa dừng lại khi chính Rose giờ đây có vẻ cũng đang trải nghiệm những thứ bí ẩn ghê rợn, chúng khiến Rose như phát điên. Cho đến khi Rose nhận thấy mọi thứ không hề diễn ra ngẫu nhiên, mà cô đang bị ám bởi một thực thể nào đó. Lúc này bí mật về quá khứ của Rose và cả lời nguyền chết chóc kia dần được hé lộ. Điểm gây thiện cảm cực tốt của Smile chính là cốt truyện được đầu tư chỉn chu. Nội tâm nhân vật được xây dựng rất kỹ, từng nghi vấn được đặt ra và mỗi sự giải đáp đều đem đến bất ngờ. Không đơn thuần đi theo lối mòn của nhiều chủ đề thường thấy như trừ tà, “chặt chém”, nhà ma…, Smile quay về với một trong những ý tưởng khá thú vị khi chọn đề tài tâm linh: lời nguyền. Ở khía cạnh nào đấy, đây cũng là ẩn dụ cho các chứng bệnh về tâm thần học của con người.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phonenumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `birthday`, `gender`, `email`, `phonenumber`) VALUES
('KH0001', 'long', '123', 'Huỳnh Đình Long', '2002-10-20', 'Nam', 'longh123123@gmail.com', '0905275904'),
('KH0002', 'thaodi', '123', 'Nguyễn Thị Thanh Thảo', '2002-08-21', 'Nữ', 'thaodi0605@gmail.com', '0939152748');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `id_manager` varchar(10) NOT NULL,
  `username_manager` varchar(50) NOT NULL,
  `password_manager` varchar(50) NOT NULL,
  `fullname_manager` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `CMND_manager` varchar(20) NOT NULL,
  `gender_manager` varchar(10) NOT NULL,
  `email_manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `manager`
--

INSERT INTO `manager` (`id_manager`, `username_manager`, `password_manager`, `fullname_manager`, `birthday`, `CMND_manager`, `gender_manager`, `email_manager`) VALUES
('MN0001', 'admin', '123456', 'Huỳnh Đình Long', '0000-00-00', '52000777', 'Male', 'long@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie`
--

CREATE TABLE `movie` (
  `id_movie` varchar(10) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `poster` varchar(200) NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `summary` varchar(800) NOT NULL,
  `nation` varchar(50) NOT NULL,
  `during` varchar(30) NOT NULL,
  `premiere` varchar(30) NOT NULL,
  `actor` varchar(100) NOT NULL,
  `director` varchar(50) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `revenue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie`
--

INSERT INTO `movie` (`id_movie`, `movie_name`, `poster`, `trailer`, `type`, `summary`, `nation`, `during`, `premiere`, `actor`, `director`, `sold`, `revenue`) VALUES
('MV0001', 'Bà Hoàng Lươn Lẹo', 'bahoangluonleo.jpg', 'https://www.youtube.com/embed/UdQ_TsDfANI', 'Hài', 'Bộ phim xoay quanh nữ chính trị gia bị dính lời nguyền không thể nói dối. Với sự trợ giúp từ một đồng minh mới có \"cái miệng vàng ngọc\" không khác gì mình, bà quyết tâm tái xuất chính trường sau lần thất bại đau đớn ở kỳ tranh cử trước.', 'Korea', '105 min', '4/11/2022', 'Ra Mi Ran, Kim Mu Yeol, Yoon Kyung Ho, Seo Hyun Wo', 'Jang Yoo Jeong', 6, 550000),
('MV0002', 'Bỗng Dưng Trúng Số', 'bongdungtrungso.jpg', 'https://www.youtube.com/embed/D3KbO3QF-lg', 'Hài', 'Người lính Hàn Quốc Chun Woo (Ko Kyoung-pyo) vô tình nhặt được tờ vé số trúng độc đắc trị giá lên đến gần 6 triệu đô! Nhưng chưa kịp vui mừng bao lâu, tờ vé số ấy không may bị cuốn bay sang bên kia biên giới và rơi vào tay anh lính Triều Tiên Yong Ho (Lee Yi-kyung). Chun Woo cần tờ vé số để đổi tiền, trong khi Yong Ho dù nắm giữ tờ vé quan trọng lại không thể đặt chân đến Hàn Quốc. Câu chuyện ngày càng trở nên rắc rối và hài hước khi có thêm những người đồng đội của hai anh chàng biết được sự việc và nhất quyết tham gia vào cuộc đàm phán chia tiền.', 'Korea', '113 min', '23/9/2022', 'Ko Kyoung-pyo, Lee Yi-kyung, Eum Mun-suk', 'Park Gyu-tae', 3, 550000),
('MV0003', 'Chiến Binh Báo Đen 2: Wakanda Bất Diệt', 'chienbinhbaoden.jpg', 'https://www.youtube.com/embed/sKX4zA52B9c', 'Hành Động, Phiêu Lưu, Tâm Lý', 'Nữ hoàng Ramonda, Shuri, M’Baku, Okoye và Dora Milaje chiến đấu để bảo vệ quốc gia của họ khỏi sự can thiệp của các thế lực thế giới sau cái chết của Vua T’Challa. Khi người Wakanda cố gắng nắm bắt chương tiếp theo của họ, các anh hùng phải hợp tác với nhau với sự giúp đỡ của War Dog Nakia và Everett Ross và tạo ra một con đường mới cho vương quốc Wakanda.', 'America', '161 min', '10/11/2022', 'Tenoch Huerta, Martin Freeman, Lupita Nyong\'o', 'Ryan Coogler', 2, 400000),
('MV0004', 'Harry Potter Và Chiếc Cốc Lửa', 'harrypottervachieccoclua.jpg', 'https://www.youtube.com/embed/Y3bLHHN129k', 'Phiêu Lưu, Thần thoại', 'Bộ phim thứ tư trong loạt phim Harry Potter vẫn xoay quanh Harry Potter (Daniel Radcliffe) và những người bạn của mình Ron (Rupert Grint) và Hermione (Emma Watson). Họ trở thành học sinh năm thứ 4 tại trường Hogwarts, và trong năm học này sẽ diễn ra một giải đấu sắp diễn ra giữa ba trường pháp thuật lớn. Người tham gia đại diện của mỗi trường sẽ được chọn bởi Chiếc cốc lửa, trong đó có Harry. Cậu sẽ phải tham dự giải đấu cực kỳ nguy hiểm này, và sẽ phải làm gì để giành chiến thắng?', 'America', '150 min', '4/11/2022', 'Daniel Radcliffe, Emma Watson, Rupert Grint, Robert Pattinson', 'Mike Newell', 0, 0),
('MV0005', 'Lyle Chú Cá Sấu Biết Hát', 'lylechuacasaubiethat.jpg', 'https://www.youtube.com/embed/J14BfxOUxIs', 'Hoạt Hình', 'Khi gia đình Primm chuyển đến thành phố New York, cậu con trai nhỏ Josh gặp khó khăn trong việc thích nghi với ngôi trường và những người bạn mới. Mọi thứ thay đổi khi cậu bé phát hiện ra ra Lyle - một chàng cá sấu mê tắm rửa, trứng cá muối và âm nhạc sống trên gác mái của của mình. Hai người nhanh chóng trở thành bạn bè. Thế nhưng, khi cuộc sống của Lyle bị ông hàng xóm Grumps đe dọa, gia đình Primm buộc phải kết hợp với ông chủ cũ của Lyle là Hector P. Valenti (Javier Bardem) để cho cả thế giới thấy giá trị tình thân và sự kỳ diệu của một chàng cá sấu biết hát.', 'America', '107 min', '4/11/2022', 'Shawn Mendes, Javier Bardem, Winslow Fegley, Constance Wu', 'Will Speck, Josh Gordon', 0, 0),
('MV0006', 'Yêu Không Sợ Hãi', 'yeukhongsohai.jpg', 'https://www.youtube.com/embed/IfmosBj6EQY', 'Hài, Kinh Dị, Tình Cảm ', 'Din và Ploy phải giả vờ hành động như thể họ vẫn còn yêu nhau để quay một video cuối cùng cho nhà sản xuất nhẫn kim cương lớn trước khi họ chính thức kết thúc mối quan hệ của mình. Boriboon là huấn luyện viên cuộc sống nổi tiếng, sử dụng con của mình để kiếm thu nhập và đang cố gắng giành quyền nuôi con trai với vợ. Ba người cùng gặp và lợi dụng lẫn nhau để hoàn thành những mục đích cá nhân Họ đi lạc và gặp Chú Phol - người tình nguyện đưa cả ba đến nghỉ một đêm tại một cửa hàng đồ cổ cũ giữa cánh đồng bắp. Trong lúc cả ba khám phá ngôi nhà thì gặp phải những chuyện ám ảnh. Một đêm kinh hoàng liệu sẽ cướp đi sinh mạng của tất cả mọi người. Chuyện gì đã xảy ra với họ? Tại sao họ lại bị ma ám? Cùng tìm ra sự thật đáng sợ với những tràng cười sảng khoái đến tận phút cuối cùng.', 'ThaiLand', '121 min', '18/11/2022', 'Pattie Ungsumalynn Sirapatsakmetha, Dan Worrawech Danuwong', 'Worrawech Danuwong', 1, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` varchar(10) NOT NULL,
  `promotion_name` varchar(50) NOT NULL,
  `poster` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_name`, `poster`, `content`) VALUES
('KM001', 'SINH NHẬT LONG XUYÊN - QUÀ NGUYÊN CẢ THÁNG', 'khuyenmai1.jpg', 'Light Long Xuyên tổ chức sinh nhật cả tháng'),
('KM002', '“Cháy” Cùng Dòng Chảy – Nhận Quà Độc Quyền', 'khuyenmai2.jpg', 'Từ 15.12.2022, với mỗi giao dịch 02 vé <b>Avatar: The Way Of Water</b>, khách hàng có cơ hội nhận quà OFFICIAL! Đế sạc không dây, bình nước thép không gỉ, túi tote tái chế, móc khóa, sổ tay… sẽ xuất hiện ngẫu nhiên theo hóa đơn mua vé. Tất cả đều là hàng <b>ĐỘC QUYỀN</b> cho rạp phim.'),
('KM003', 'Ly Lấp Lánh Mừng Avatar Trở Lại', 'khuyenmai3.jpg', 'Bom tấn có doanh thu cao nhất mọi thời đại Avatar sắp trở lại với phần 2 mang tên <b>Avatar: The Way Of Water</b>. Theo dòng sự kiện, <b style=\"color: white\">Light</b> <b style=\"color: red\">Cinema</b> đổ bộ loạt “dòng chảy” cho các Stars nhà mình với: \r\n<b>Combo Wow 1</b> gồm 01 Ly Avatar 2 + 01 phần nước ngọt với chỉ 169k <b>Combo Wow 2</b> gồm 01 ly Avatar 2 + 01 phần nước ngọt + 01 hộp bắp rang thơm phức với chỉ 179k'),
('KM004', 'Mừng Rạp Mới - Tới Trường Chinh Là Có Quà!', 'khuyenmai4.jpg', 'Mừng <b>Cinema Trường Chinh</b> “chào đời”, từ 15.12.2022, đến ngay Tầng 3 - Co.opMart TTTM Thắng Lợi - Số 2 Trường Chinh, Tây Thạnh, Tân Phú nhận Combo quà xài thả ga!'),
('KM005', 'ZaloPay Mùa Nào Cũng Khao', 'khuyenmai5.jpg', 'ZALOPAY TẶNG BẠN YÊU GALAXY CINEMA ƯU ĐÃI SIÊU HOT'),
('KM006', 'Vui Mùa Lễ Hội - Hái Voucher Hời', 'khuyenmai6.jpg', 'Trong không khí tưng bừng chào đón mùa lễ hội lớn nhất năm Galaxy Education hợp tác cùng Galaxy Cinema mang đến cho các khách hàng những ưu đãi siêu to khổng lồ:  Tặng 01 buổi đánh giá năng lực Tiếng Anh 4 kỹ năng theo tiêu chuẩn quốc tế (Cambridge/ IELTS) <b>trị giá 500.000 VNĐ</b> dành riêng cho khách hàng của <b style=\"color: white\">Light</b> <b style=\"color: red\">Cinema</b>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `room_id` varchar(10) NOT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`room_id`, `room_number`) VALUES
('R0001', '01'),
('R0002', '02'),
('R0003', '03'),
('R0004', '04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `screenings`
--

CREATE TABLE `screenings` (
  `screenings_id` varchar(20) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `id_movie` varchar(10) NOT NULL,
  `day_playing` date NOT NULL,
  `time_playing` time NOT NULL,
  `seat_empty` varchar(300) NOT NULL,
  `seat_selected` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `screenings`
--

INSERT INTO `screenings` (`screenings_id`, `room_id`, `id_movie`, `day_playing`, `time_playing`, `seat_empty`, `seat_selected`) VALUES
('SC0001', 'R0001', 'MV0001', '2022-12-17', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0002', 'R0001', 'MV0001', '2022-12-17', '09:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0003', 'R0001', 'MV0001', '2022-12-18', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5,G3,G4,G3,G4,G3,G4,G3,G4'),
('SC0004', 'R0001', 'MV0001', '2022-12-19', '20:00:00', 'A1,B1,C1,D1,E1,F1,G1,H1,I1,J1,A2,B2,C2,D2,E2,F2,G2,H2,I2,J2,A3,B3,C3,D3,E3,F3,G3,H3,I3,J3,A4,B4,C4,G4,H4,I4,J3,A5,B5,C5,D5,E5,F5,G5,H5,I5,J5,A6,B6,C6,D6,E6,F6,G6,H6,I6,J6,A7,B7,C7,D7,E7,F7,G7,H7,I7,J7,A8,B8,C8,D8,E8,F8,G8,H8,I8,J8,A9,B9,C9,D9,E9,F9,G9,H9,I9,J9,A10,B10,C10,D10,E10,F10,G10,I10,J10', 'D4,E4,F4,H10,'),
('SC0005', 'R0001', 'MV0001', '2022-12-19', '22:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0006', 'R0001', 'MV0001', '2022-12-17', '10:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0007', 'R0001', 'MV0001', '2022-12-17', '15:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0008', 'R0002', 'MV0002', '2022-12-20', '19:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0009', 'R0002', 'MV0002', '2022-12-21', '08:30:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0010', 'R0002', 'MV0002', '2022-12-21', '12:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0011', 'R0002', 'MV0002', '2022-12-21', '20:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0012', 'R0003', 'MV0003', '2022-12-18', '15:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0013', 'R0003', 'MV0003', '2022-12-19', '12:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0014', 'R0003', 'MV0003', '2022-12-22', '21:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0015', 'R0003', 'MV0003', '2022-12-22', '22:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0016', 'R0004', 'MV0004', '2022-12-17', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0017', 'R0004', 'MV0004', '2022-12-18', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0018', 'R0004', 'MV0004', '2022-12-19', '13:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5,E3,E4'),
('SC0019', 'R0004', 'MV0004', '2022-12-20', '15:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0020', 'R0004', 'MV0004', '2022-12-20', '17:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0021', 'R0001', 'MV0005', '2022-12-17', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0022', 'R0001', 'MV0005', '2022-12-17', '09:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0023', 'R0001', 'MV0005', '2022-12-18', '10:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5,F6'),
('SC0024', 'R0002', 'MV0006', '2022-12-23', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0025', 'R0002', 'MV0006', '2022-12-24', '08:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0026', 'R0002', 'MV0006', '2022-12-24', '10:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0027', 'R0002', 'MV0006', '2022-12-25', '17:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5'),
('SC0028', 'R0002', 'MV0006', '2022-12-25', '18:00:00', 'A1, B1, C1, D1, E1, F1, G1, H1, I1, J1, A2, B2, C2, D2, E2, F2, G2, H2, I2, J2, A3, B3, C3, D3, E3, F3, G3, H3, I3, J3, A4, B4, C4, D4, E4, F4, G4, H4, I4, J3, A5, B5, C5, D5, E5, F5, G5, H5, I5, J5, A6, B6, C6, D6, E6, F6, G6, H6, I6, J6, A7, B7, C7, D7, E7, F7, G7, H7, I7, J7, A8, B8, C8, D8, E8, ', 'H10, I10, J10,H5,H4,H4,H5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `upcoming_movie`
--

CREATE TABLE `upcoming_movie` (
  `id_up_movie` varchar(10) NOT NULL,
  `up_movie_name` varchar(50) NOT NULL,
  `poster_up` varchar(50) NOT NULL,
  `trailer_up` varchar(200) NOT NULL,
  `type_up` varchar(100) NOT NULL,
  `summary_up` varchar(800) NOT NULL,
  `nation_up` varchar(50) NOT NULL,
  `during_up` varchar(10) NOT NULL,
  `premiere_up` varchar(20) NOT NULL,
  `actor_up` varchar(100) NOT NULL,
  `director_up` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `upcoming_movie`
--

INSERT INTO `upcoming_movie` (`id_up_movie`, `up_movie_name`, `poster_up`, `trailer_up`, `type_up`, `summary_up`, `nation_up`, `during_up`, `premiere_up`, `actor_up`, `director_up`) VALUES
('MVU0001', 'Avatar: Dòng Chảy Của Nước', 'avatar.jpg', 'https://www.youtube.com/embed/oeRG9A6bDdY', 'Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu', 'Câu chuyện của “Avatar: Dòng Chảy Của Nước” lấy bối cảnh 10 năm sau những sự kiện xảy ra ở phần đầu tiên. Phim kể câu chuyện về gia đình mới của Jake Sully (Sam Worthington thủ vai) cùng những rắc rối theo sau và bi kịch họ phải chịu đựng khi phe loài người xâm lược hành tinh Pandora.', 'America', '120 min', '16/12/2022', 'Sam Worthington, Zoe Saldana, Dương Tử Quỳnh', 'James Cameron'),
('MVU0002', 'Chị Chị Em Em 2', 'chichiemem.jpg', 'https://www.youtube.com/embed/nXlgYpvAC2c', 'Hài, Tâm Lý', 'Dựa trên giai thoại mỹ nhân Ba Trà & Tư Nhị, Chị Chị Em Em 2 xoay quanh giai đoạn 2 đệ nhất mỹ nhân Ba Trà và Tư Nhị gặp gỡ nhau, từ đó tái hiện cuộc sống hoa lệ nhiều góc khuất tại Sài thành cách đây một thế kỷ...', 'VietNam', '120 min', '22/1/2023', 'Minh Hằng, Ngọc Trinh', 'Vũ Ngọc Đãng'),
('MVU0003', 'Cuộc Diễu Hành Thầm Lặng', 'cuocdieuhanhthamlang.jpg', 'https://www.youtube.com/embed/4CBMJIIVeoQ', 'Hồi hộp', 'Tác phẩm trinh thám nổi tiếng từ nhà văn lừng danh Higashino Keigo mang tên CUỘC DIỄU HÀNH THẦM LẶNG sẽ được chuyển thể lên màn ảnh với bộ phim cùng tên, theo chân nhà vật lý học Yukawa Manabu hay còn gọi là \"giáo sư Galileo\". Bộ phim sẽ xoay quanh cái c.hết của một cô gái trẻ nổi tiếng. Nghi phạm của vụ án lại được phóng thích vì thiếu chứng cứ. \"Giáo sư Galileo\" phải trở thành vị thám tử để điều tra vụ án.', 'Japan', '120 min', '9/12/2022', 'Masaharu Fukuyama, Ko Shibasaki, Kazuki Kitamura', 'Hiroshi Nishitani'),
('MVU0004', 'Harry Potter Và Hoàng Tử Lai', 'harrypottervahoangtulai.jpg', 'https://www.youtube.com/embed/kLIoLXJTX_c', 'Phiêu Lưu, Thần thoại', 'Khi các Tử thần Thực tử tàn sát thế giới phù thủy và Muggle, Hogwarts không còn là nơi trú ẩn an toàn cho học sinh. Mặc dù Harry Potter (Daniel Radcliffe) nghi ngờ có những mối nguy hiểm mới đang rình rập trong các bức tường lâu đài, cụ Dumbledore vẫn dồn hết tâm sức vào việc chuẩn bị cho phù thủy trẻ tuổi cho trận chiến cuối cùng với Voldemort. Harry Potter tình cờ khám phá được cuốn sách của Hoàng Tử Lai, từ đó phát hiện ra nhiều bí mật liên quan đến Chúa Tể Hắc Ám và truy tìm nguồn gốc của người được cho là “Hoàng Tử Lai”.', 'America', '153 min', '2/12/2022', 'Daniel Radcliffe, Emma Watson, Rupert Grint, Robert Pattinson', 'David Yates'),
('MVU0005', 'Thế Giới Lạ Lùng', 'thegioilalung.jpg', 'https://www.youtube.com/embed/8VGv6KExL0E', 'Hoạt Hình, Khoa Học Viễn Tưởng', 'Strange World kể về chuyến phiêu lưu “vượt không gian và thời gian” của gia đình Clades, một gia đình tập hợp toàn những huyền thoại trong làng phiêu lưu khám phá trong chuyến đi khó nhằn nhất của họ. Chuyến đi là cuộc hành trình đến một vùng đất kỳ lạ đầy rẫy những điều bí hiểm cùng những sinh vật chưa bao giờ xuất hiện. Đây cũng có thể sẽ là chuyến hành trình mang tới nhiều điều kỳ lạ nhất của Disney tới khản giả. Nhưng dường như thế giới kì bí ấy có thể còn dễ đương đầu hơn cả những khác biệt và xung đột trong chính gia đình này.', 'America', '120 min', '25/11/2022', 'Jake Gyllenhaal, Alan Tudyk', 'Don Hall'),
('MVU0006', 'Thực Đơn Bí Ẩn', 'thucdonbian.jpg', 'https://www.youtube.com/embed/dm7fTmEKQkk', 'Hài, Hồi hộp, Kinh Dị', 'Một cặp đôi trẻ (Anya Taylor Joy và Nicholas Hoult) đi du lịch đến một hòn đảo xa xôi để ăn tại một nhà hàng độc quyền nơi đầu bếp (Ralph Fiennes) đã chuẩn bị một thực đơn xa hoa, với một số sự thật bất ngờ.', 'America', '107 min', '18/11/2022', 'Ralph Fiennes, Anya Taylor-Joy, Nicholas Hoult', 'Mark Mylod');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Chỉ mục cho bảng `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`commentary_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Chỉ mục cho bảng `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Chỉ mục cho bảng `screenings`
--
ALTER TABLE `screenings`
  ADD PRIMARY KEY (`screenings_id`);

--
-- Chỉ mục cho bảng `upcoming_movie`
--
ALTER TABLE `upcoming_movie`
  ADD PRIMARY KEY (`id_up_movie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
