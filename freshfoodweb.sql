-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 13, 2023 lúc 11:11 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `freshfoodweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `scontent` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `published` int(1) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `create_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `scontent`, `content`, `thumb`, `published`, `alias`, `create_date`, `views`) VALUES
(5, 'CÂY LÁ NGÓN – CÁCH PHÂN BIỆT CÂY LÁ NGÓN', '✍️ Đã có rất nhiều câu chuyện về cái chết liên quan đến loại lá ngon, thế nhưng nhiều người vẫn mắt sai lầm vì ăn nhằm lá ngón, dẫn đến những câu chuyện đáng tiếc xảy ra.', '<p><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><img class=\"size-medium wp-image-30741 aligncenter\" src=\"https://csfood.vn/wp-content/uploads/2020/07/l%C3%A1-ng%C3%B3n-300x169.jpg\" alt=\"\" width=\"300\" height=\"169\" srcset=\"https://csfood.vn/wp-content/uploads/2020/07/lá-ngón-300x169.jpg 300w, https://csfood.vn/wp-content/uploads/2020/07/lá-ngón-375x211.jpg 375w, https://csfood.vn/wp-content/uploads/2020/07/lá-ngón.jpg 480w\" sizes=\"(max-width: 300px) 100vw, 300px\" style=\"border: 0px; vertical-align: top; max-width: 100%; height: auto; display: block; margin: 5px auto;\"></p><div class=\"text_exposed_show\" bis_skin_checked=\"1\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Mới đây trên báo Tuổi Trẻ lại có thông tin đáng buồn về câu chuyện ăn nhằm lá ngón:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Ftuoitre.vn%2F3-nguoi-tu-vong-2-nguoi-nhap-vien-do-an-%3Ffbclid%3DIwAR0wk9VSdJT7yOKjVgvVLKsi5uvVUoyPUW9XdpfDfLBpsCGlhJNsXth-RO0&amp;h=AT1LdHbrCqhttNB8nnsW3i0_ske14HdQphW8TNzOTOruWh-5sq_t4ZfE5XrmcFBBOofhZbslxZ6KJKU9Acp4UDJlSWy_GrMICuTlI0S8rd4bEkPwpRF1I98a17OUZcSn9HOJqqBOdPUqf2zIO1Od4DA32TpRIxstSgJpGxCz62bsgRw_MkFIASgPhMCx1OQ253Z6PYWsI61BHV5I6pYq98MCCsQsCQ_IzOy2nIFE2lohLNiMPp6Wi0cceH98GhV90kHzPFO1Ve4cTSHv198SCGvi7JxeyC7XUNrH_nf5Xypqtd0K55T-CuZNsffuHiipkBXcfv0BISzocjFXjYaKvtlmat1qOLEgcT7BMABlNMvt3Uzh0C8ic5omy-kQSQCgACq9XKR6NGPdqgw-UeJNNEuWOp2K9sTjtY3m8a33_o-w008Azqeej86I_j2zTD-MA-_5TrnZyJ3QGNIcW7xVTjg8n24Gq6H97PwzJCgOaElPkPxGbmI-ZH0C562GHz383pWt0B-6b6UyftJ9RT97CVuqottkAsDkF02OKcJFSJ40_M3OuB5bFxPm8h3TKmJrRksMZpeKDzgETozDoCyCFXdv9TPBeiqsFEcdLqyMyqvIKBgzGwnFT1QR3xq4MvVBqqS1\" target=\"_blank\" rel=\"noopener nofollow noreferrer\" data-ft=\"{&quot;tn&quot;:&quot;-U&quot;}\" data-lynx-mode=\"async\" style=\"color: rgb(102, 102, 102); outline: none !important;\">https://tuoitre.vn/3-nguoi-tu-vong-2-nguoi-nhap-vien-do-an-</a>…</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><span class=\"_5mfr\">☘️</span><span class=\"_5mfr\">☘️</span>&nbsp;Hôm nay Csfood sẽ chia sẻ cho các bạn cách phân biệt và nhận dạng lá ngón để có thêm kiến thức cảnh giác tránh nhằm lẫn dẫn đến những hậu quả không lường.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Lá ngón là một loại thực vật có thân quấn, màu xanh. Cây lá ngón có thể dài 12m. Loại cây này còn có tên gọi khác là đoạn trường thảo (tức là đứt từng đoạn ruột). Thực tế, không ít người đã bị ngộ độc khi ăn phải loại lá này.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><span class=\"_5mfr\">✍️</span>&nbsp;Cây lá ngón thường được tìm thấy ở vùng núi. Trước đây, những người dân tộc vùng cao thường dùng lá ngón để tự tử. Với những độc dược có trong lá ngón, con người có thể chết ngay sau khi ăn hoặc uống nước.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Đặc điểm nhận dạng cây lá ngón:</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><span class=\"_5mfr\">– Lá ngón</span>&nbsp;có thân và phần cành không có lông – trên phần thân lá hơi có khía dọc.<br>– Lá có hình thuôn dài, mọc đối xứng, đầu nhọn, bóng nhẵn.<br>– Lá ngón sẽ dài khoảng 7 – 12 cm và có bề rộng 2,5 – 5,5 cm. Chúng thường mọc thành chùm ở đầu cành.<br><span class=\"_5mfr\">– Hoa lá ngón</span>&nbsp;thường nở vào tháng 6, 8, 10 và có màu vàng với 5 cánh.<br><span class=\"_5mfr\">–&nbsp;</span>Quả của lá ngón có màu nâu, thon dài, rộng khoảng 0,5 cm, không có lông bao quanh.<br><span class=\"_5mfr\">–&nbsp;</span>Hạt lá ngón khá nhỏ, có màu nâu nhạt.<br>–&nbsp; Ở các cành non, lá sẽ có màu xanh lục nhưng khá nhạt – đến giai đoạn già, lá sẽ chuyển dần sang màu xám nâu nhạt.<br>—————————————————<br><span class=\"_5mfr\">⚠️</span><span class=\"_5mfr\">⚠️</span><span class=\"_5mfr\">⚠️</span>&nbsp;Lưu ý:</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">– Độc tính của lá ngón là do các ancaloit chứa trong toàn bộ cây, trật tự độc giảm từ rễ, lá, hoa, quả và thân cây.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">– Ở Việt Nam lá ngón được coi là một trong những cây có độc tính hàng cao nhất (thuốc độc bảng A), một số người cho rằng chỉ cần ăn ba lá là đủ chết người.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">– Lá ngón được hấp thu rất nhanh qua đường tiêu hóa chỉ từ 5-30 phút. Thời gian tử vong trung bình từ 1 – 7,5h.<br>—————————————————-<br>Lá ngón là loại cây cực độc nhìn giống rau rừng, thế nên chúng ta cần phải trang bị đầy đủ kiến thức, cẩn trọng đề phòng để tránh những sự nhằm lẫn thương tâm không mong muốn xẩy ra.</p><div><br></div></div>', 'php12F141648.jpg', 1, 'cay-la-ngon-cach-phan-biet-cay-la-ngon-26414', '2023-09-14 04:04:20', 0),
(6, 'Pate Tươi Kiểu Pháp', 'Pâté là món ăn không chỉ bổ dưỡng mà còn nhanh- gọn – lẹ – tiện dụng cho mọi gia đình.\r\n\r\nBởi thế, hôm nay Csfood sẽ giới thiệu cho cả nhà 1 loại Pate tươi kiểu Pháp, theo công thức Pâté gan ngỗng được áp dụng thành công lên gan gà với độ thơm, bùi, tan mịn cực kỳ độc đáo.', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\">NHÌN LÀ MÊ – ĂN LÀ GHIỀN</span><br><span style=\"font-weight: 700;\">PATE TƯƠI KIỂU PHÁP VỊ NGON TRÊN CẢ TUYỆT VỜI.</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Pâté là món ăn không chỉ bổ dưỡng mà còn nhanh- gọn – lẹ – tiện dụng cho mọi gia đình.</p><div class=\"text_exposed_show\" bis_skin_checked=\"1\" style=\"color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">Bởi thế, hôm nay Csfood sẽ giới thiệu cho cả nhà 1 loại Pate tươi kiểu Pháp, theo công thức Pâté gan ngỗng được áp dụng thành công lên gan gà với độ thơm, bùi, tan mịn cực kỳ độc đáo.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span style=\"font-weight: 700;\">Pate tươi gan gà Pháp Home Made hộp 200g:</span>&nbsp;<a href=\"https://csfood.vn/cuahang/thuc-pham-che-bien/thuc-pham-dong-lanh-bao-quan-mat/pate-tuoi-gan-ga-phap-home-made-hop-200g/?fbclid=IwAR0s9iDK2gluvf0DCHyhi05VPpfMzvdN7GpW99_bDGGfKJBt71wiL6Vtc-Y\" target=\"_blank\" rel=\"noopener nofollow noreferrer\" data-ft=\"{&quot;tn&quot;:&quot;-U&quot;}\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fcsfood.vn%2Fcuahang%2Fthuc-pham-che-bien%2Fthuc-pham-dong-lanh-bao-quan-mat%2Fpate-tuoi-gan-ga-phap-home-made-hop-200g%2F%3Ffbclid%3DIwAR0s9iDK2gluvf0DCHyhi05VPpfMzvdN7GpW99_bDGGfKJBt71wiL6Vtc-Y&amp;h=AT1iZbIYL4BD2sszFo4UkEzYtCOLmauRuCey_FGAYt9VEAETfr7DwSY6IdBI0GvMY9wyJBWovESdcCt8buM_Yb8_aDqtdJAdCeMyJga41NZywwbIzAzxyrYO7-buadpeusLcaGbQaFFO-9yirU-7AC8KpGMmkfrU7ti94jwItvHU-agKTP6oSs7-oBwDROZfThZIsFFuJg6Yqct4yruLY83DAkw0gBLuK_4HGCEGFywDXDSZRR9bKTWTFgIekkLqhi1z2Pg3nyE2PwtshwAEjvmL35ZuITGk9vQ61tRssiXsMHLn9WgcCRjO5nBTnLrUGS1g5QuGRI_GuYt48fohSoQfIi7Y6maeL_Iep3OnJRU33zet_A2OeV1vVNwkgp9x6VBMdlnzChruItF2g2P3iHiqRMFMuAqU8SXQ4c0GlZeUhXfcEOTISFs0Jnbk-zj7YQS1krEcxEthb7Yr0cVn7MNXKD-o_IFkTUOXKZYWAXdi26UMpEZskpFgbnB4vJNiEiF2NhN0vy2tRycJnJasqdD_gnoVGV3uNSBrA9uHhJiikcTBtiTqldmbULxLXN077K4T1bzTEYJpJPjeexR1O1Wu07rLBsp_qBGJDBCM2zzGWfVkW8bIk97TGaKpmoB1Livb\" style=\"color: rgb(102, 102, 102); outline: none !important;\">https://csfood.vn/…/pate-tuoi-gan-ga-phap-home-made-hop-20…/</a></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">–</span>&nbsp;Pate tươi kiểu Pháp homemade có độ nhuyễn mịn, rất thơm, ngậy nhưng hoàn toàn kg béo mỡ.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">–</span>&nbsp;Thưởng thức PaTe gan gà phải từ tốn để cảm nhận vị béo và mùi thơm của gan như tan dần trên đầu lưỡi một cách nhẹ nhàng.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">–</span>&nbsp;Vị béo nhẹ phảng phất, không gắt, không hăng, trôi lững lờ xuống cổ mà không có cảm giác ngậy.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span style=\"font-weight: 700;\">Đặc biệt:</span>&nbsp;Là Pâté tươi, sản xuất trong ngày hoàn toàn không chất bảo quản.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">Ăn cùng bánh mì que, bánh mì sandwich, trộn cơm cho trẻ nhỏ, hay buổi sáng chiên trứng ốpla, làm bánh mì chảo, hoặc ăn cùng xôi ngon ngất ngây, càng ăn càng ghiền.</p></div>', 'php630144797.png', 1, 'pate-tuoi-kieu-phap-91158', '2023-09-14 04:05:46', 0),
(7, 'Công dụng của măng cụt bạn đã biết chưa?', 'Trong thành phần dinh dưỡng của măng cụt chứa nhiều Vitamin C, chất xơ, khoáng chất giúp cơ thể của mẹ bầu ít ốm vặt, thai nhi phát triển khỏe mạnh.', '<p><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><img class=\"aligncenter wp-image-29824 size-medium\" title=\"Công dụng của măng cụt bạn đã biết chưa?\" src=\"https://csfood.vn/wp-content/uploads/2020/05/m%C4%83ng-c%E1%BB%A5t-3-253x300.jpg\" alt=\"Công dụng của măng cụt bạn đã biết chưa?\" width=\"253\" height=\"300\" srcset=\"https://csfood.vn/wp-content/uploads/2020/05/măng-cụt-3-253x300.jpg 253w, https://csfood.vn/wp-content/uploads/2020/05/măng-cụt-3-317x375.jpg 317w, https://csfood.vn/wp-content/uploads/2020/05/măng-cụt-3.jpg 500w\" sizes=\"(max-width: 253px) 100vw, 253px\" style=\"border: 0px; vertical-align: top; max-width: 100%; height: auto; display: block; margin: 5px auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Dưới đây Csfood sẽ giới thiệu cho các bạn những lợi ích của măng cụt với thai kỳ:</p><h3 style=\"font-family: Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 18px;\">1. Ăn măng cụt không lo tăng cân</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Trong thành phần dưỡng chất của măng cụt chứa rất ít calo, không chứa chất béo bão hòa và cholesterol nên rất phù hợp với những mẹ bầu đang gặp vấn đề về cân nặng. TRong 100g măng cụt chỉ chứa 63 calo, những chứa 5g chất xơ, rất cần thiết cho sự tiêu hóa của mẹ bầu.</p><h3 style=\"font-family: Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 18px;\">2. Tăng cường sức đề kháng</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Trong thành phần dưỡng chất của măng cụt chứa một lượng vitamin C dồi dào, 100g cung cấp khoảng 7,2mg Vitamin C, măng cụt giúp tăng khả năng miễn dịch của cơ thể, bảo vệ mẹ bầu khỏi những căn bệnh thông thường như ho, cảm.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Vitamin C là một trong những chất chống oxy hóa, vitamin C dóng vai trò quan trọng trong việc xây dựng hệ thống miễn dịch của cơ thể vô cùng hiệu quả.</p><h3 style=\"font-family: Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 18px;\">3. Ngăn ngừa thiếu máu.</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Trong thành phần dinh dưỡng của măng cụt góp phần thúc đẩy hoạt động của các tế bào máu và ngăn ngừa bệnh thiếu máu. Ngoài ra, nó cải thiện lưu lượng máu bằng cách làm giãn nở mạch máu giúp bảo vệ chúng ta chống lại một số bệnh như xơ vữa động mạch, cholesterol cao, nghẹt tim và đau ngực nặng.</p><h3 style=\"font-family: Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-top: 20px; margin-bottom: 10px; font-size: 18px;\"><span style=\"font-weight: 700;\">4. Tốt cho thai nhi.</span></h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Trong thành phần dinh dưỡng của măng cụt chứa hàm lượng axit folic trong măng cụt giúp ngăn ngừa dị tật ống thần kinh cho thai nhi và giúp mẹ bầu duy trì một thai kỳ khỏe mạnh.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Khi mẹ bầu ăn măng cụt sẽ mang lại nhiều lợi ích cho sức khỏe mẹ, nhưng bầu cũng đừng quá lạm dụng măng ụt trong chế độ dinh dưỡng của mình chỉ nên ăn vừa phải sẽ tốt cho sức khỏe của bạn.</p>', 'phpC7E122152.jpg', 1, 'cong-dung-cua-mang-cut-ban-da-biet-chua-74340', '2023-09-14 04:07:18', 0),
(8, 'HƯỚNG DẪN NGÂM SÂM NGỌC LINH VỚI MẬT ONG ĐÚNG CÁCH', 'Sâm Ngọc Linh ngâm mật ong được coi là vị thuốc đại bổ nguyên khí, bồi dưỡng huyết khí, tăng cường sinh lực – sinh lý, giữ gìn thanh xuân và giải độc cơ thể, chữa suy nhược thần kinh, trí nhớ sa sút và giảm stress tâm lý.', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\">Tuy nhiên&nbsp;<span class=\"_5afx\">sâm_Ngọc_Linh</span>&nbsp;thái lát ngâm mật dù đơn giản cũng phải biết cách làm để đạt hiệu quả cao và nhất là bảo quả<span class=\"text_exposed_show\">n lâu dài.</span></p><div class=\"text_exposed_show\" bis_skin_checked=\"1\" style=\"color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span>&nbsp;Sau đây&nbsp;<span class=\"_5afx\">Csfood</span>&nbsp;xin hướng dẫn cho các bạn cách ngâm sâm Ngọc Linh đúng cách:</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span>&nbsp;Trước hết chọn loại sâm già. Vì thái lát nên không cần Sâm Ngọc Linh phải có hình thức dài đẹp, đắt tiền mà chỉ cần sâm đủ tuổi (trên 7 năm) để tiết kiệm chi phí. Thái lát mỏng củ sâm theo chiều ngang thân củ sẽ thấy lát sâm có vòng lõi và phần viền. Nếm vị sẽ thấy vị đắng xen lẫn vị ngọt dịu, nhai lát sâm cảm nhận được vị thơm nhẹ trong vòm miệng. Khác với sâm Hàn Quốc có vị thơm lừng do nhiều tinh dầu thì&nbsp; Sâm Ngọc Linh vị thơm thoảng.&nbsp;<span class=\"_5mfr\">☘️</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span>&nbsp;Sau khi thái lát mỏng thì nên phơi cho se khô với mục đích làm lát sâm mất nước khi bỏ vào mật sẽ không làm loãng mật dễ gây chua, hỏng mật. Tránh ngâm liền khi vừa thái xong. Ngâm với tỷ lệ 1 lạng sâm 500, 700ml mật ong. Ngâm trong lọ thuỷ tinh có nắp vặn là tốt nhất.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span>&nbsp;Sau 1 tuần ngâm, lát sâm sẽ ngấm mật nở ra như hình dáng lát sâm ban đầu lúc mới thái (ngược lại nếu thái lát ngâm ngay vào mật thì lát sâm sẽ bị quắt lại do bị mật rút nước)</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\">CÁCH DÙNG:<br><span class=\"_5mfr\">?</span>&nbsp;Dùng ngày 1-3 lát kèm muỗng mật để bồi dưỡng cơ thể. Dùng khi cơ thể mệt mỏi, khó chịu hay lúc say xỉn, bia rượu.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span>&nbsp;Nếu có bệnh dùng 5-10 lát ngày, chia làm hai buổi sáng, chiều. Tránh dùng buổi tối gây mất ngủ.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span>&nbsp;Ngoài ra Csfood còn cung cấp cả sâm Ngọc Linh tươi chính gốc Quảng Nam và sâm Ngọc_Linh Ngâm Mật Ong rừng nguyên chất.</p></div>', 'phpC6F333393.jpg', 1, 'huong-dan-ngam-sam-ngoc-linh-voi-mat-ong-dung-cach-90801', '2023-09-14 04:08:23', 0),
(9, 'NHỮNG LỢI ÍCH CỦA VIỆC ĂN CHAY, BẠN CÓ BIẾT CHƯA❓', '✍️ Ăn chay đúng cách, biết kết hợp các thứ rau đậu hài hòa, bạn không những có đầy đủ chất dinh dưỡng nuôi cơ thể, phát triển trí não, mà còn tránh xa được bệnh tật', '<div class=\"content-text entry-content clearfix\" bis_skin_checked=\"1\" style=\"color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">✍️</span>&nbsp;Ăn chay đúng cách, biết kết hợp các thứ rau đậu hài hòa, bạn không những có đầy đủ chất dinh dưỡng nuôi cơ thể, phát triển trí não, mà còn tránh xa được bệnh tật.&nbsp;<span class=\"_5mfr\">?</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">✍️</span>&nbsp;Trước hết bạn sẽ có một trái tim khỏe mạnh, tránh xa tiểu đường, xơ vữa động mạch bởi những chất béo có hại từ động vật.</p><div class=\"text_exposed_show\" bis_skin_checked=\"1\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">✍️</span>&nbsp;Các món ăn chay thường giàu chất xơ, vitamin, khoáng chất, những món này lại vô cùng lành tính, thanh lọc cơ thể bạn, thải bớt những chất độc ứ đọng trong cơ thể để bạn có thể sống khỏe mạnh và kéo dài tuổi thọ hơn.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">✍️</span>&nbsp;Ăn chay cũng là một cách để bạn ăn kiêng, giữ gìn vóc dáng thanh mảnh, gọn nhẹ, thanh thoát. Ăn chay để bạn có một cuộc sống thanh tịnh hơn.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">✍️</span>&nbsp;Khi ăn chay, bạn sẽ cảm thấy yêu đời hơn, dễ trút bỏ những buồn vui quá mức, những suy nghĩ tiêu cực trong đầu, bạn dễ lấy lại được cân bằng trong cuộc sống.&nbsp;<span class=\"_5mfr\">☘️</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">➡️</span><span class=\"_5mfr\">➡️</span>&nbsp;Việc ăn chay sẽ khiến lòng bạn thanh thản, nhìn cuộc sống bằng một ánh mắt nhân từ và bao dung, bạn dễ dàng yêu lấy những thứ giản dị xung quanh mình, dung hòa vào thiên nhiên, vào cảnh vật.&nbsp;<span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span></p><div><span class=\"_5mfr\"><br></span></div></div></div>', 'php8B0F22833.jpg', 1, 'nhung-loi-ich-cua-viec-an-chay-ban-co-biet-chua-29683', '2023-09-14 04:09:13', 0),
(10, 'NƯỚC CỐT HỒNG SÂM HÀN QUỐC GINST15 BẠN ĐÃ DÙNG CHƯA❓❓❓', '✍️✍️✍️  Nước cốt hồng sâm hiện nay trên thị trường là sản phẩm được rất nhiều người ưa chuộng, chính vì thế Csfood chính thức phân phối ra thị trường dòng sản phẩm NƯỚC CỐT HỒNG SÂM GINST15 được nhập khẩu trực tiếp từ Hàn Quốc.', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><span class=\"_5mfr\">✍️</span><span class=\"_5mfr\">✍️</span><span class=\"_5mfr\">✍️</span>&nbsp;&nbsp;<span class=\"_5afx\"><span style=\"font-weight: 700;\">Nước cốt hồng sâm</span></span>&nbsp;hiện nay trên thị trường là sản phẩm được rất nhiều người ưa chuộng, chính vì thế&nbsp;<span class=\"_5afx\"><span style=\"font-weight: 700;\">Csfood</span></span>&nbsp;chính thức phân phối ra thị trường dòng sản phẩm NƯỚC CỐT HỒNG SÂM GINST15 được nhập khẩu trực tiếp từ Hàn Quốc.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><span class=\"_5mfr\">❌</span>&nbsp;Công dụng của Nước Cốt Hồng Sâm:&nbsp;<span class=\"_5mfr\">⬇️</span><span class=\"_5mfr\">⬇️</span><span class=\"_5mfr\">⬇️</span></p><div class=\"text_exposed_show\" bis_skin_checked=\"1\" style=\"color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">✅</span>&nbsp;Bồi bổ, phục hồi sức khỏe;<br><span class=\"_5mfr\">✅</span>Giúp hỗ trợ đường huyết cho bệnh bị tiểu đường, giảm mỡ máu;<br><span class=\"_5mfr\">✅</span>Giúp tăng cường chức năng sinh lý Nam;<br><span class=\"_5mfr\">✅</span>Chống lão hóa, giúp cải thiện và làm đẹp da;<br><span class=\"_5mfr\">✅</span>Chống stress, chống mệt mỏi, chống căng thẳng thần kinh;<br><span class=\"_5mfr\">✅</span>&nbsp;Tăng cường hệ miễn dịch.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span>&nbsp;Sản phẩm được cấp Giấy Chứng Nhận Lâm Sàng và được xuất trên dây chuyền chế biến hiện đại, kết hợp với phương pháp chế biến truyền thống giữ nguyên được những thành phần quý hiếm của nhân sâm Hàn Quốc.&nbsp;<span class=\"_5mfr\">?</span><span class=\"_5mfr\">?</span></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px;\"><span class=\"_5mfr\">Tham khảo thêm thông tin chi tiết tại: https://csfood.vn/cuahang/thuc-pham-bo-duong/nuoc-cot-hong-sam-han-quoc-ginst15/</span></p></div>', 'php335691969.png', 1, 'nuoc-cot-hong-sam-han-quoc-ginst15-ban-da-dung-chua-51472', '2023-09-14 04:09:56', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `create_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `name`, `comment`, `create_date`) VALUES
(1, 2, 'thắng', 'blog này hay quá', '2023-09-01'),
(20, 3, 'huy', 'blog hay qua', '2023-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `published` int(1) NOT NULL,
  `alias` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `published`, `alias`) VALUES
(1, 'Rau củ quả', 'rau củ quả', 1, 'rau-cu-qua'),
(2, 'Trái cây sạch', 'trái cây', 1, 'trai-cay-sach-47191'),
(5, 'Thực phẩm khô', 'thực phẩm khô', 1, 'thuc-pham-kho-35036'),
(6, 'Sản phẩm tươi sống tự nhiên', 'Thịt và thuỷ hải sản', 1, 'san-pham-tuoi-song-tu-nhien-30135'),
(7, 'Thức uống', 'Thức uống', 1, 'thuc-uong-63785'),
(8, 'Sản phẩm chế biến', 'Sản phẩm chế biến', 1, 'san-pham-che-bien-73417'),
(9, 'Thực phẩm chế biến sẵn', 'Thực phẩm chế biến sẵn', 1, 'thuc-pham-che-bien-san-12927');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cities`
--

CREATE TABLE `cities` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `cities`
--

INSERT INTO `cities` (`id`, `name`, `type`) VALUES
(45, 'Tỉnh Quảng Trị', 'Tỉnh'),
(46, 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
(48, 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
(49, 'Tỉnh Quảng Nam', 'Tỉnh'),
(51, 'Tỉnh Quảng Ngãi', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `create_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `create_date`) VALUES
(9, 'adad', NULL, 'dâd', 'adada', '2023-09-03'),
(10, 'adaddad', NULL, 'ada', 'adadad', '2023-09-03'),
(11, 'qưdqd', NULL, 'đưqqđ', 'dqwdqwdqwd', '2023-09-03'),
(12, 'ada', NULL, 'adad', 'đaad', '2023-09-03'),
(13, 'ad', NULL, 'a', 'a', '2023-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `type` int(1) NOT NULL,
  `expire_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `type`, `expire_date`, `quantity`, `value`, `max_discount`, `total_order`) VALUES
(2, 'Code giảm giá 30/4', 'MIK2OKDHUY', 2, '2023-09-23', 14, 100000, NULL, 300000),
(3, 'Code giảm giá 14/2', 'MAM231JGUM', 1, '2023-09-20', 500, 20, 200000, 500000),
(4, 'Code giảm giá ưu đãi', 'HT4MJ123TU', 1, '2023-09-11', 10, 15, 300000, 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`, `type`, `city_id`) VALUES
(461, 'Thành phố Đông Hà', 'Thành phố', 45),
(462, 'Thị xã Quảng Trị', 'Thị xã', 45),
(464, 'Huyện Vĩnh Linh', 'Huyện', 45),
(465, 'Huyện Hướng Hóa', 'Huyện', 45),
(466, 'Huyện Gio Linh', 'Huyện', 45),
(467, 'Huyện Đa Krông', 'Huyện', 45),
(468, 'Huyện Cam Lộ', 'Huyện', 45),
(469, 'Huyện Triệu Phong', 'Huyện', 45),
(470, 'Huyện Hải Lăng', 'Huyện', 45),
(471, 'Huyện Cồn Cỏ', 'Huyện', 45),
(474, 'Thành phố Huế', 'Thành phố', 46),
(476, 'Huyện Phong Điền', 'Huyện', 46),
(477, 'Huyện Quảng Điền', 'Huyện', 46),
(478, 'Huyện Phú Vang', 'Huyện', 46),
(479, 'Thị xã Hương Thủy', 'Thị xã', 46),
(480, 'Thị xã Hương Trà', 'Thị xã', 46),
(481, 'Huyện A Lưới', 'Huyện', 46),
(482, 'Huyện Phú Lộc', 'Huyện', 46),
(483, 'Huyện Nam Đông', 'Huyện', 46),
(490, 'Quận Liên Chiểu', 'Quận', 48),
(491, 'Quận Thanh Khê', 'Quận', 48),
(492, 'Quận Hải Châu', 'Quận', 48),
(493, 'Quận Sơn Trà', 'Quận', 48),
(494, 'Quận Ngũ Hành Sơn', 'Quận', 48),
(495, 'Quận Cẩm Lệ', 'Quận', 48),
(497, 'Huyện Hòa Vang', 'Huyện', 48),
(502, 'Thành phố Tam Kỳ', 'Thành phố', 49),
(503, 'Thành phố Hội An', 'Thành phố', 49),
(504, 'Huyện Tây Giang', 'Huyện', 49),
(505, 'Huyện Đông Giang', 'Huyện', 49),
(506, 'Huyện Đại Lộc', 'Huyện', 49),
(507, 'Thị xã Điện Bàn', 'Thị xã', 49),
(508, 'Huyện Duy Xuyên', 'Huyện', 49),
(509, 'Huyện Quế Sơn', 'Huyện', 49),
(510, 'Huyện Nam Giang', 'Huyện', 49),
(511, 'Huyện Phước Sơn', 'Huyện', 49),
(512, 'Huyện Hiệp Đức', 'Huyện', 49),
(513, 'Huyện Thăng Bình', 'Huyện', 49),
(514, 'Huyện Tiên Phước', 'Huyện', 49),
(515, 'Huyện Bắc Trà My', 'Huyện', 49),
(516, 'Huyện Nam Trà My', 'Huyện', 49),
(517, 'Huyện Núi Thành', 'Huyện', 49),
(518, 'Huyện Phú Ninh', 'Huyện', 49),
(519, 'Huyện Nông Sơn', 'Huyện', 49),
(522, 'Thành phố Quảng Ngãi', 'Thành phố', 51),
(524, 'Huyện Bình Sơn', 'Huyện', 51),
(525, 'Huyện Trà Bồng', 'Huyện', 51),
(526, 'Huyện Tây Trà', 'Huyện', 51),
(527, 'Huyện Sơn Tịnh', 'Huyện', 51),
(528, 'Huyện Tư Nghĩa', 'Huyện', 51),
(529, 'Huyện Sơn Hà', 'Huyện', 51),
(530, 'Huyện Sơn Tây', 'Huyện', 51),
(531, 'Huyện Minh Long', 'Huyện', 51),
(532, 'Huyện Nghĩa Hành', 'Huyện', 51),
(533, 'Huyện Mộ Đức', 'Huyện', 51),
(534, 'Huyện Đức Phổ', 'Huyện', 51),
(535, 'Huyện Ba Tơ', 'Huyện', 51),
(536, 'Huyện Lý Sơn', 'Huyện', 51);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `ship_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `paid` int(1) NOT NULL,
  `pay_date` datetime DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `shipper_id` int(11) DEFAULT NULL,
  `city` int(5) NOT NULL,
  `district` int(5) NOT NULL,
  `ward` int(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sdescription` text NOT NULL,
  `description` longtext NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `featured` int(1) NOT NULL,
  `published` int(1) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `alias` varchar(300) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `sdescription`, `description`, `cate_id`, `price`, `discount`, `featured`, `published`, `create_date`, `alias`, `stocks`) VALUES
(9, 'Bắp cải trắng hữu cơ 700g', 'Trong bữa ăn gia đình, bắp cải được các bà nội trợ biến hóa thành nhiều món ăn ngon. Bắp cải luộc thơm ngọt vị gừng, bắp cải xào cà chua thanh mát, dưa bắp cải muối giòn rụm, chấm cùng nước mắm cay thật ngon miệng.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Trong bữa ăn gia đình, bắp cải được các bà nội trợ biến hóa thành nhiều món ăn ngon. Bắp cải luộc thơm ngọt vị gừng, bắp cải xào cà chua thanh mát, dưa bắp cải muối giòn rụm, chấm cùng nước mắm cay thật ngon miệng. Cầu kỳ hơn, nhiều người còn làm gỏi bắp cải, bắp cải cuốn thịt bằm nấu canh. Nhiều người mới chỉ biết bắp cải là loại rau lành, mát, dễ ăn mà chưa biết hết những giá trị y học quý giá của nó. Loại rau dẫn đầu trong các loại rau họ cải này chứa một nguồn dinh dưỡng rất cao: khoảng 90% nước, 1,8% đạm, 5,4% chất bột đường, 1,6% chất xơ và nhiều khoáng chất, vitamin quý như can-xi, phốt-pho, sắt, vitamin C, B1, B2… Với ưu thế đó, người dân đã đưa bắp cải vào làm đẹp, dinh dưỡng và chữa bệnh. Cách đây hơn 60 năm, các nhà nghiên cứu đã phát hiện trong bắp cải tươi có chứa một chất gọi là vitamin U và sau đó, người ta dùng lá bắp cải tươi để làm thuốc điều trị loét, viêm dạ dày và ruột. Tuy nhiên vitamin U là chất không bền vững, tan trong nước, dễ oxy hóa và bị hủy hoại ở nhiệt độ cao. </span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Vì thế, để chữa bệnh, các thầy thuốc Đông y không khuyến khích việc chế biến rau quá kỹ. Muốn tận dụng tối đa vitamin U, bạn nên dùng dưới dạng nước ép rau tươi là tốt nhất. Không chỉ tốt cho người bị loét dạ dày, giới nghiên cứu còn công nhận bắp cải có khả năng chống ung thư vú, ung thư ruột kết. Tác dụng tuyệt vời này là do trong rau bắp cải có chứa chất chống ung thư như sulforaphane, phenethyl isothiocyanate và indole – 3 – carbinol. Tuy nhiên, bạn lưu ý, bắp cải có thể gây bướu cổ. Do đó, người bị rối loạn tuyến giáp hoặc bướu cổ không nên ăn uống nhiều bắp cải. Ngoài ra, những người suy thận nặng, phải chạy thận nhân tạo cũng không nên dùng. Hiện nay, với quy trình trồng trọt hiện đại, bắp cải đã có mặt quanh năm trên các sạp rau ở chợ, trong siêu thị. Bạn có thể dễ dàng mua và chế biến theo nhiều cách để phù hợp với khẩu vị gia đình. Để phòng tránh rau nhiễm hóa chất, bạn nên mua rau của các cơ sở cung cấp rau an toàn</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Ngoài ra, trước khi chế biến dưới bất kỳ hình thức nào, bạn nên tách từng lá, rửa sạch và ngâm với nước muối khoảng 15 phút. Bạn nên ăn bắp cải ít nhất hai lần/tuần. Kinh nghiệm cho bạn Bắp cải ngon thường cuộn chặt, lá bóng, lõi tươi, chắc tay. Bắp cải kém chất lượng có nhiều lá vàng, lõi bị nứt và ngửi thấy mùi hôi, úa. Bạn không nên để bắp cải quá lâu vì rau dễ bị khô, cứng. Bắp cải nguyên bảo quản trong tủ lạnh nên dùng trong khoảng 1 tuần. Bắp cải đã cắt miếng nên dùng trong vòng hai ngày sau khi cắt.</span></p><p><br></p>', 1, 67700, 58900, 1, 1, '2023-09-14 02:45:58', 'bap-cai-trang-huu-co-700g-30204', 200),
(10, 'Bắp cải tím hữu cơ 500g', 'Bắp cải tím: tên khoa học là Brassica oleracea var capitata ruba là cây bắp cải có màu tím. Xuất xứ từ Địa Trung Hải, hiện nay được trồng rộng rãi khắp thế giới, thích hợp với khí hậu ôn đới và tại Việt Nam bắp cải tím được trồng nhiều ở Đà Lạt.', '<div bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">• Sở dĩ bắp cải tím có màu như vậy là vì nó có hàm lượng cao polyphenol anthocyanin, chất này có tính kháng viêm, bảo vệ tế bào khỏi những tổn hại của tia cực tím và có thể giúp giảm nguy cơ mắc một số bệnh ung thư.&nbsp;</div><div bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">• Đặc biệt, lượng vitamin C trong bắp cải tím gấp 6-8 lần so với bắp cải xanh, đồng thời chứa nhiều chất dinh dưỡng thực vật hơn bắp cải xanh.&nbsp;</div><div bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Cách sử dụng: Bắp cải thường được chế biến bằng cách luộc, hoặc xào, làm salad, cuốn thịt hoặc làm gỏi. (Các cách chế biến tham khảo mục món ngon)&nbsp;</div><div bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Cách bảo quản: Khi mua về mà chưa dùng, bạn không rửa bởi khi dính nước nó sẽ nhanh hỏng, hãy để trong túi nhựa và cất ở ngăn mát của tủ lạnh (được khoảng 1 tuần). Nếu dùng một lần không hết cả cái, bạn có thể giữ phần bắp cải còn lại bằng cách vẩy lên một ít nước rồi cho vào túi nhựa và cất trong tủ lạnh.</div>', 1, 55000, NULL, 1, 1, '2023-09-14 02:48:15', 'bap-cai-tim-huu-co-500g-31247', 33),
(11, 'Hoa hồi hữu cơ Vinasamex 50g', 'Hoa hồi hữu cơ Vinasamex 50g', '<p><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thành phần:&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">100% hồi hữu cơ Việt Nam</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Xuất xứ&nbsp;thương hiệu:&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Việt Nam</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng:</span><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">&nbsp;Sử dụng làm gia vị nấu ăn</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Bảo quản:</span><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">&nbsp;Nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp&nbsp;</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Chứng nhận hữu cơ EU, USDA, JAS, Hàn Quốc</span><br></p>', 5, 89000, 49500, 1, 1, '2023-09-14 02:58:09', 'hoa-hoi-huu-co-vinasamex-50g-38321', 20),
(12, 'Táo Dazzle hữu cơ 1kg', 'Táo Dazzle hữu cơ New Zealand là loại táo ăn liền với độ ngọt, giòn bất ngờ. Lớp vỏ ngoài căng bóng, có màu đỏ tươi cho thấy lượng anthocyanin trong táo Dazzle cao hơn so với các loại táo xanh khác.', '<table class=\"tbl-description\" style=\"text-align: right; outline: 0px; border-spacing: 0px; color: rgb(51, 51, 51); font-family: latoregular, sans-serif; font-size: 14px;\"><tbody style=\"outline: 0px;\"><tr style=\"outline: 0px;\"><td style=\"outline: 0px; padding: 30px 0px; border-bottom: 2px solid rgb(237, 234, 230);\"><div class=\"product_readmore\" bis_skin_checked=\"1\" data-readmore=\"\" aria-expanded=\"true\" id=\"rmjs-1\" style=\"outline: 0px; width: 472.5px; transition: height 100ms ease 0s; overflow: hidden; max-height: none; height: 645px;\"><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-align: justify;\"><span style=\"outline: 0px; font-weight: bolder;\">Chứng nhận/ Canh tác:</span>&nbsp;Chứng nhận hữu cơ BioGro của New Zealand.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\"><span style=\"outline: 0px; font-weight: bolder;\">Xuất xứ:</span>&nbsp;Trang trại tại New Zealand.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\"><span style=\"outline: 0px; font-weight: bolder;\">Công dụng:</span></p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\">Táo Dazzle hữu cơ New Zealand là loại táo ăn liền với độ ngọt, giòn bất ngờ. Lớp vỏ ngoài căng bóng, có màu đỏ tươi cho thấy lượng anthocyanin trong táo Dazzle cao hơn so với các loại táo xanh khác. (Anthocyanin là một loại flavonoid, một họ các chất chống oxy hóa mạnh mẽ chống lại tác động của lão hóa và stress oxy hóa. Anthocyanin còn đóng một vai trò quan trọng trong việc phòng và hỗ trợ điều trị các bệnh về mắt, ngăn ngừa ung thư, bệnh tim phổi, bệnh xơ cứng động mạch, chống viêm..)</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\">Táo Dazzle hữu cơ sinh trưởng tự nhiên ở New Zealand, hấp thụ ánh nắng mặt trời cùng nguồn dinh dưỡng không bị tác động từ bất kỳ hoá chất hay thuốc trừ sâu. Vì thế táo Dazzle hữu cơ không chỉ giàu vitamin C cùng chất xơ, mà còn có độ ngon thuần túy, phù hợp với mọi chế độ ăn uống và mọi lứa tuổi.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\"><span style=\"outline: 0px; font-weight: bolder;\">Gợi ý sử dụng:</span>&nbsp;Dùng trực tiếp, ép nước với các loại rau củ, làm bánh táo, làm salad...</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\"><span style=\"outline: 0px; font-weight: bolder;\">Hướng dẫn bảo quản:</span>&nbsp;Bảo quản trong ngăn mát tủ lạnh.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\"><span style=\"outline: 0px; font-weight: bolder;\">Hạn sử dụng:</span>&nbsp;3 - 6 ngày tùy điều kiện bảo quản.</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\"></p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 25px 0px 0px; text-align: justify;\">Tại Organica, mỗi trái táo Dazzle đều có tem nhãn với tên gọi, nhà vườn và dãy số bắt đầu là số 9 chỉ có ở các loại táo hữu cơ.</p></div></td></tr></tbody></table>', 2, 220000, NULL, 1, 1, '2023-09-14 03:01:16', 'tao-dazzle-huu-co-1kg-74343', 40),
(13, 'Bánh hỏi gạo lứt hữu cơ Bích Chi 200g', 'Bánh hỏi có sợi nhỏ, tròn, màu nâu được làm từ gạo lứt nguyên chất an toàn, chất lượng. Bánh hỏi gạo lứt hữu cơ Bích Chi hộp 200g tiện lợi, chỉ cần luộc qua nước sôi là có thể sử dụng và chế biến những món ăn yêu thích như xào, trộn,... Bánh hỏi Bích Chi tiện lợi, nhanh gọn cho bạn bữa ăn nhanh.', '<ul style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><li>Loại sản phẩm&nbsp;<p>Bánh hỏi</p></li><li>Trọng lượng&nbsp;<p>200g</p></li><li>Loại sợi&nbsp;<p>Sợi tròn, nhỏ, màu nâu</p></li><li>Thành phần&nbsp;<p>Gạo lứt hữu cơ 100%. Không sử dụng hoá chất bảo quản.</p></li><li>Cách dùng&nbsp;<p>Chế nước sôi vào cho ngập bánh hỏi. Đậy kín lại khoảng 1.5 - 2 phút. Vớt ra để ráo rồi dùng ngay. Hoặc ngâm bánh hỏi trong nước ấm khoảng 2 phút, hấp khoảng 4 - 5 phút. Tuỳ nghi sử dụng. Lưu ý - phải thoa dầu vô xửng hấp.</p></li><li>Bảo quản&nbsp;<p>Để nơi khô mát, tránh ánh nắng trực tiếp và nhiệt độ cao</p></li><li>Thương hiệu&nbsp;<p>Bích Chi (Việt Nam)</p></li><li>Sản xuất tại&nbsp;<p>Việt Nam</p></li></ul>', 9, 58200, 52900, 1, 1, '2023-09-14 03:06:21', 'banh-hoi-gao-lut-huu-co-bich-chi-200g-88781', 31),
(14, 'Lõi vai bò úc hữu cơ obe - 300g', 'Nếu cuối tuần muốn đổi gió hoặc bạn là một người sành ăn thì không nên bỏ qua thịt bò hữu cơ OBE nhé  - 100% Bò OBE không sử dụng thuốc kháng sinh, hóc môn tăng trưởng.', '<div class=\"title_module_main heading-bar d-flex justify-content-between align-items-center\" bis_skin_checked=\"1\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding-bottom: 10px; border-bottom: 1px solid rgb(238, 238, 238); padding-top: 5px; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><h2 class=\"heading-bar__title \" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: 1.4em;\">Mô tả sản phẩm</h2></div><div class=\"rte product_getcontent py-3 pos-relative\" bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><div id=\"content\" bis_skin_checked=\"1\" style=\"overflow: hidden; word-break: break-word;\">Nếu cuối tuần muốn đổi gió hoặc bạn là một người sành ăn thì không nên bỏ qua thịt bò hữu cơ OBE nhé&nbsp; - 100% Bò OBE không sử dụng thuốc kháng sinh, hóc môn tăng trưởng.&nbsp; - Giống bò chất lượng ngon nhất, không biến đổi gene, không sử dụng các chất kích thích.&nbsp; - Bò ăn mềm, ngọt, thơm, ngậy béo....ĐẬM ĐÀ một cách tự nhiên.&nbsp; - Nhập khẩu chính thức, có giấy tờ, chứng nhận ORGANIC MỸ, ÚC.&nbsp; - 100% Bò được vận chuyển theo đường AIR (Máy bay)</div></div>', 6, 232500, NULL, 1, 1, '2023-09-14 03:09:39', 'loi-vai-bo-uc-huu-co-obe-300g-16828', 23),
(15, 'Vẹm xanh nữa vỏ organic newzealand 1kg', 'Vẹm xanh New Zealand: thịt vẹm săn chắc, dai ngọt, thơm và béo ngậy. Vẹm nhiều thịt nên hạn chế được vấn đề sản phẩm bị teo khi chế biến Đạt chứng nhận hữu cơ New Zealand', '<p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">- Vẹm xanh New Zealand giàu chất dinh dưỡng, hàm lượng chất sắt cao, protein và các axit béo Omega-3 rất cần thiết; bên cạnh lượng chất béo, calories và cholesterol rất thấp. Vẹm xanh rất tốt cho người lớn tuổi cải thiện được vấn đề xương khớp. Sau khi được đánh bắt và thu hoạch theo quy trình chuẩn nghiêm ngặt, vẹm được đưa vào dây chuyền tách vỏ, hấp và cấp đông ngay lập tức để chúng có thể giữ được vị thịt tươi ngon.<br>- Vẹm xanh New Zealand do đã được hấp sơ, bản thân lại rất nhiều thịt nên hạn chế được vấn đề sản phẩm bị teo khi chế biến, đảm bảo sản sẽ rất đẹp mắt khi chế biến lại có thể thả ga thưởng thức.<br>Vẹm xanh New Zealand là một đặc sản nổi tiếng ở vùng biển New Zealand, khác với những loại vẹm xanh khác, vẹm xanh New Zealand được nuôi trồng theo quy chuẩn sạch từ giống đến thu hoạch. Quá trình nuôi trồng kiểm soát chặt chẽ về tất cả mọi thứ bao gồm thức ăn, môi trường, điều kiện sống, chế độ chăm sóc.<br>Món ngon từ vẹm xanh New Zealand Pure Organic như : hấp sả, hấp thái, nướng mỡ hành, đút lò phomai, xào miến, xào mì ý, nấu lẩu,</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Đặc tính:<br>- Chứng nhận Hữu Cơ New Zealand</p>', 6, 395000, 385000, 1, 1, '2023-09-14 03:11:53', 'vem-xanh-nua-vo-organic-newzealand-1kg-20632', 45),
(16, 'Phile bò tơ tây ninh 300g', 'Thịt phile bò tơ Tây Ninh được Organicfood.vn lấy từ nguồn bò tơ chất lượng từ Tây Ninh và cung cấp thịt cho khách hàng ngay sau khi giết mổ, được đóng gói chân không, hút ẩm từ 1 đến 2 giờ đảm bảo vị ngon nhất của thịt bò.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thịt phile bò tơ Tây Ninh được Organicfood.vn lấy từ nguồn bò tơ chất lượng từ Tây Ninh và cung cấp thịt cho khách hàng ngay sau khi giết mổ, được đóng gói chân không, hút ẩm từ 1 đến 2 giờ đảm bảo vị ngon nhất của thịt bò.&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Organicfood.vn đảm bảo: Không có chất bảo quản, không thức ăn tăng trưởng, không thịt bò bện</p>', 6, 144000, NULL, 1, 1, '2023-09-14 03:13:07', 'phile-bo-to-tay-ninh-300g-11167', 21),
(17, 'Hàu nhật size 6-8 con/kg', 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%.\r\n- Nhập Khẩu Trực Tiếp Từ Nhật Bản\r\n- Được Nuôi Trong Môi Trường Hoàn Toàn Tự Nhiên Ở Những Vùng Biển Cực Sạch Của Nhật Bản', '<p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%.</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">- Nhập Khẩu Trực Tiếp Từ Nhật Bản<br>- Được Nuôi Trong Môi Trường Hoàn Toàn Tự Nhiên Ở Những Vùng Biển Cực Sạch Của Nhật Bản<br>- Hàu Nhật Được Nuôi Bằng Phương Pháp Hiện Đại, Được Treo Lơ Lửng Trên Dây. Chất Lượng Hàu Nhật Phụ Thuộc Rất Nhiều Vào Chất Lượng Nước Biển.<br>- Thịt Hàu Nhật Rất Ngọt Và Rất Sạch<br>- Được Cấp Đông Bằng Công Nghệ Proton<br>- Bảo Quản : Trong Tủ Đông Ở - 18°C<br>- Chế Biến: Dùng Trực Tiếp Sashimi Với Chanh Hoặc Có Thể Chế Biến Tùy Thích Nướng Phomai Hoặc Nướng Mỡ Hành,….<br>- So Với Hàu Cùng Loại Tại Các Vùng Biển Việt Nam, Hàu Nhật Có Mùi Nhẹ Nhàng Hơn Nhiều. Vì Thế, Để Tận Hưởng Được Vị Ngọt, Mặn Đặc Trưng, Nên Hạn Chế Dùng Với Wasabi (Mù Tạt) Như Cách Thông Thường. Thay Vào Đó, Hãy Vắt Vài Giọt Chanh Và Dùng Ngay. Vị Chua Của Chanh Sẽ Trung Hoà Với Vị Mặn Của Nước Biển, Đẩy Vị Ngọt Của Thịt Hàu Lên Đúng Với Chất Lượng Của Nó.</p>', 6, 331000, 313000, 1, 1, '2023-09-14 03:14:59', 'hau-nhat-size-6-8-conkg-48144', 23),
(18, 'Phile cá hồi hữu cơ 200g', 'Cá hồi Nauy Organic sinh sống trong làn nước sạch tự nhiên của vùng biển Na Uy ở phía Bắc Đại Tây Dương. Nơi này có khí hậu lạnh quanh năm với mức nhiệt duy trì ở mức -17 độ C, thậm chí có khi nhiệt độ lên tới – 20 độ C.\r\nCá hồi Organic Nauy không giống như những dòng cá hồi thường, những chú cá này có chất lượng tốt nhất bởi được chăm sóc trong môi trường đặc biệt, được tự do bơi lội, phát triển mà không tiếp xúc với tác nhân gây hại từ con người. Thức ăn sử dụng hoàn toàn là hữu cơ, đi cùng với đó là môi trường sống sạch với các dòng biển lạnh, đáp ứng các tiêu chuẩn nghiêm ngặt.', '<p><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Cá hồi Nauy Organic</span><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">&nbsp;sinh sống trong làn nước sạch tự nhiên của vùng biển Na Uy ở phía Bắc Đại Tây Dương. Nơi này có khí hậu lạnh quanh năm với mức nhiệt duy trì ở mức -17 độ C, thậm chí có khi nhiệt độ lên tới – 20 độ C.</span></p><div bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><p>Cá hồi Organic Nauy không giống như những dòng cá hồi thường, những chú cá này có chất lượng tốt nhất bởi được chăm sóc trong môi trường đặc biệt, được tự do bơi lội, phát triển mà không tiếp xúc với tác nhân gây hại từ con người. Thức ăn sử dụng hoàn toàn là hữu cơ, đi cùng với đó là môi trường sống sạch với các dòng biển lạnh, đáp ứng các tiêu chuẩn nghiêm ngặt.</p><p><span style=\"font-weight: bolder;\">Cá hồi Nauy Organic</span>&nbsp;có những ưu điểm vượt trội sau:&nbsp;</p><p>- Thịt cá dai, tươi có độ săn chắc và giòn hơn;</p><p>- Lượng dầu béo, lượt nhớt ở vảy ít hơn nên giảm cảm giác bị ngấy;</p><p>- Thịt có màu vàng nghệ chứ không hồng đỏ như các dòng cá hồi thông thường;</p><p>- Thịt đậm đà và ngon hơn;</p><p>- Đầu, đuôi và xương cá bé nên khi fillet giảm được tỷ lệ thịt bị hao;</p></div>', 6, 242000, NULL, 1, 1, '2023-09-14 03:17:16', 'phile-ca-hoi-huu-co-200g-86392', 15),
(19, 'Ghẹ thiên nhiên tách thịt 150g', 'Là sản phẩm được chọn lọc từ những con cua chuẩn chắc thịt, khoẻ tươi, được nuôi trồng đúng tiêu chuẩn thực phẩm sạch.\r\nThịt cua mềm, ngọt, dễ ăn lại chứa nhiều dưỡng chất tốt cho sức khỏe, nhất là đối với phụ nữ mang thai và trẻ nhỏ.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Là sản phẩm được chọn lọc từ những con cua chuẩn chắc thịt, khoẻ tươi, được nuôi trồng đúng tiêu chuẩn thực phẩm sạch.</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thịt cua mềm, ngọt, dễ ăn lại chứa nhiều dưỡng chất tốt cho sức khỏe, nhất là đối với phụ nữ mang thai và trẻ nhỏ.</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn sử dụng: Rã đông trước khi chế biến, gợi ý một số món ăn ngon từ thịt cua:</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">-Súp cua nấu ngô và nấm tuyết</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">-Cua trộn gỏi rau càng cua</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">-Canh rau đay thịt cua</span><br></p>', 6, 355000, 340000, 1, 1, '2023-09-14 03:19:06', 'ghe-thien-nhien-tach-thit-150g-48370', 23),
(20, 'Cải kale hữu cơ 250g', 'Cải Kale là một loại rau với lá xanh, có họ gần với bắp cải hơn các loại rau trồng khác. Với đặc tính khá cứng nên phải nấu khá lâu mới mềm (như rau ngót). Cải Kale rất giàu chất xơ, canxi cùng nhiều vitamin (như vitamin C, A, K…) và khoáng chất có lợi khác(như sắt, canxi, kali, mangan và phốt pho…)', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Cải Kale là một loại rau với lá xanh, có họ gần với bắp cải hơn các loại rau trồng khác. Với đặc tính khá cứng nên phải nấu khá lâu mới mềm (như rau ngót). Cải Kale rất giàu chất xơ, canxi cùng nhiều vitamin (như vitamin C, A, K…) và khoáng chất có lợi khác(như sắt, canxi, kali, mangan và phốt pho…) &nbsp; &nbsp; CÁCH BẢO QUẢN Cách 1: Bảo quản trong tủ lạnh Chỉ cần bảo quản trong tủ lạnh là có thề giữ Cải kale tươi từ 4 đến 5 ngày. Bên cạnh đó, để giữ được cải Kale tươi nhất, bạn nên gói trong giấy báo hoặc 1 chiếc khăn ẩm rồi cho vào trong tủ lạnh. Tránh để lá tiếp xúc trực tiếp với hơi lạnh gây héo. Cách 2: Trụng sơ trước khi cho vào tủ lạnh Thay vì bỏ trực tiếp vào tủ lạnh, bạn có thể cắt lấy lá Cải kale trụng sơ. Sau đó, cho vào hộp nhựa và bảo quản trong tủ lạnh. Cách thức này giúp bạn bảo quản từ 4-5 ngày, ưu điểm của nó là không sợ cải Kale bị vàng. Tuy nhiên, không trụng quá chín, chỉ trụng sơ vừa chín tới.</span><br></p>', 1, 62500, NULL, 0, 1, '2023-09-14 03:21:22', 'cai-kale-huu-co-250g-59599', 43),
(21, 'Cà chua bee ngọt hữu cơ  300g', 'Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư. Theo WHFoods, trong một nghiên cứu 14 tháng,trên Tạp chí của Viện Ung thư Quốc gia tìm thấy cà chua đóng một vai trò quan trọng trong việc phòng ngừa ung thư tuyến tiền liệt. Cà chua chứa lycopene, chất có liên quan đến công tác phòng chống bệnh tim. Nó cũng có chức năng như một chất chống oxy hóa giúp bảo vệ tế bào.</span><br></p>', 1, 63200, 49100, 0, 1, '2023-09-14 03:22:51', 'ca-chua-bee-ngot-huu-co-300g-72066', 87),
(22, 'Rau dền cơm hữu cơ - 300g', 'Rau dền hữu cơ tại Organicfood.vn được trồng và thu hoạch trong môi trường hoàn toàn hữu cơ, không có các chất hóa học, không sử dụng thuốc tăng trưởng, biến đổi gen,… Chắc chắn sẽ là một thực phẩm không thể thiếu trong mỗi bữa ăn hàng ngày của gia đình bạn.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Rau dền hữu cơ tại Organicfood.vn được trồng và thu hoạch trong môi trường hoàn toàn hữu cơ, không có các chất hóa học, không sử dụng thuốc tăng trưởng, biến đổi gen,… Chắc chắn sẽ là một thực phẩm không thể thiếu trong mỗi bữa ăn hàng ngày của gia đình bạn. &nbsp;&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">CÔNG DỤNG Rau dền hữu cơ Happy Vegi chứa nhiều vitamin C, B2, sắt, acid nicotic,… có tính thanh nhiệt, lợi tiểu, sát trùng, trị độc, điều trị các bệnh thiếu máu, giải nhiệt rất tốt vào mùa hè, điều trị táo bọn. Ngoài ra, rau dền là nguồn cung cấp canxi rất tốt cho mẹ và bé.</p>', 1, 32700, NULL, 1, 1, '2023-09-14 03:25:38', 'rau-den-com-huu-co-300g-69563', 29),
(23, 'Bắp tím nữ hoàng  500g', 'Bắp nữ hoàng là giống bắp ngọt, có nguồn gốc từ Thái Lan, được nhập về Việt Nam và trồng nhiều ở khu vực Đông Nam Bộ cùng với đồng bằng sông Cửu Long.\r\nĐược trồng theo quy trình chuẩn hữu cơ', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Bắp nữ hoàng là giống bắp ngọt, có nguồn gốc từ Thái Lan, được nhập về Việt Nam và trồng nhiều ở khu vực Đông Nam Bộ cùng với đồng bằng sông Cửu Long.</span></p><div bis_skin_checked=\"1\" style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Được trồng theo quy trình chuẩn hữu cơ</div>', 1, 54500, 42000, 0, 1, '2023-09-14 03:31:50', 'bap-tim-nu-hoang-500g-65621', 39),
(24, 'Bánh tráng gạo lứt hữu cơ Bích Chi 200g', 'Thông tin sản phẩm đang được cập nhật', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thông tin sản phẩm đang được cập nhật</span><br></p>', 9, 45500, NULL, 0, 1, '2023-09-14 03:33:24', 'banh-trang-gao-lut-huu-co-bich-chi-200g-75466', 21),
(25, 'Bánh tráng trắng hữu cơ Bích Chi 200g', 'Bánh tráng trắng hữu cơ Bích Chi 200g', '<p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Bánh tráng trắng hữu cơ Bích Chi 200g</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Xuất xứ: Việt Nam</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Chứng nhận hữu cơ châu âu, mỹ</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thành phần: tinh bột khoai mì, gạo, muối</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Cách dùng: cuốn các món ăn trực tiếp như rau với thịt, cá…</p>', 9, 40000, 32000, 0, 1, '2023-09-14 03:34:49', 'banh-trang-trang-huu-co-bich-chi-200g-34063', 81),
(26, 'Chà bông cá chẽm 70g', 'Thịt cá chẽm đã được chứng minh có giá trị dinh dưỡng rất cao, là 1 loại thực phẩm giàu dinh dưỡng, rất tốt cho những người có thể trạng suy nhược, người mới ốm dậy, phụ nữ có thai, người già hoặc trẻ em kém ăn, suy dinh dưỡng. Thịt cá chẽm có ít cholesterol, nhiều protein, axit béo Omega-3, canxi, photpho, kali, natri, sắt, đồng, magie, kẽm, selen, và rất nhiều vitamin có lợi cho cơ thể.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thịt cá chẽm đã được chứng minh có giá trị dinh dưỡng rất cao, là 1 loại thực phẩm giàu dinh dưỡng, rất tốt cho những người có thể trạng suy nhược, người mới ốm dậy, phụ nữ có thai, người già hoặc trẻ em kém ăn, suy dinh dưỡng. Thịt cá chẽm có ít cholesterol, nhiều protein, axit béo Omega-3, canxi, photpho, kali, natri, sắt, đồng, magie, kẽm, selen, và rất nhiều vitamin có lợi cho cơ thể.</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Thành phần: 98% thịt cá chẽm, 2% nước mắm. Cá chẽm hoàn toàn từ cá chẽm thiên nhiên được đánh bắt tại cửa sông ven biển Bến Tre và Rừng ngập mặn Bến Tre, giàu dinh dưỡng và an toàn cho sức khỏe gia đình bạn.</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hường dẫn sữ dụng: Ăn ngay, dùng cho trẻ tập ăn dặm, người bệnh cần phục hồi nhanh, ăn cháo, cơm, xôi…</span><br style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">Hướng dẫn bảo quản: 06 tháng ở nhiệt độ phòng. Sau khi mở nắp dùng trong 1 tháng và bảo quản ở ngăn mát tủ lạnh.</span><br></p>', 1, 134000, NULL, 0, 1, '2023-09-14 03:36:56', 'cha-bong-ca-chem-70g-48503', 21),
(27, 'Thanh long trắng hữu cơ Organicfood - 1kg', 'Thanh Long chuẩn Hữu Cơ tại Việt Nam - Tiêu Chuẩn USDA được trồng tại Bình Thuận. Đây là chứng nhận USDA mới nhất tại Việt Nam hiện tại. Với màu sắc bắt mắt, hương vị ngọt ngào, thanh long đỏ từ vỏ đến ruột, tươi ngon mát lành.', '<p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Thanh Long chuẩn&nbsp;<em>Hữu Cơ tại Việt Nam - Tiêu Chuẩn USDA</em>&nbsp;được trồng tại Bình Thuận. Đây là chứng nhận USDA mới nhất tại Việt Nam hiện tại. Với màu sắc bắt mắt, hương vị ngọt ngào, thanh long đỏ từ vỏ đến ruột, tươi ngon mát lành.</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Hiện tại trang trại thanh long Kim Hải đã và đang xuất khẩu ra thị trường các nước trong khu vực vùng các thị trường khó tính như Châu Âu, Hoa Kỳ và Nhật Bản.</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; text-align: center;\"><img src=\"https://file.hstatic.net/200000423303/file/thanh_long_huu_co_binh_thuan_c8a5286ca0434eb6b87993a0fbad3a31_grande.png\" style=\"max-width: 100%; height: auto !important;\"></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Quy trình canh tác hữu cơ USDA Organic của Bộ Nông Nghiệp Hoa Kỳ</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">+ Các mẫu nước, đất, khu vực trồng… được khảo sát, kiểm tra các chỉ tiêu về an toàn như các chỉ số về hóa học, sinh học cũng như vùng cách ly an toàn.<br>+ Thực hiện chọn giống để trồng.<br>+ Quy trình chăm sóc cây : Quy trình bón phân các giai đoạn, tưới, cắt tỉa cành, cắt tỉa trái, cắt cỏ, vệ sinh vườn…<br>+ Lấy mẫu kiểu tra, phân tích thành phẩm trái tươi trước khi thu hoạch.<br>+ Thu hoạch và đóng gói…</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; text-align: center;\"><img src=\"https://file.hstatic.net/200000423303/file/z4668561116352_e5a0be42410a6e53937dc0f28bc205ad_aee7da1815d74ce5b1f632d6b5d2df15_grande.jpg\" style=\"max-width: 100%; height: auto !important;\"></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\"><span style=\"font-weight: bolder;\">Sản phẩm đạt các tiêu chí:</span></span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">– Không thuốc diệt cỏ<br>– Không sử dụng giống biến đổi Gens<br>– Không sử dụng thuốc BVTV hóa học<br>– Không phân bón hóa học<br>– Không chất kích thích tăng trường<span style=\"font-weight: bolder;\">&nbsp;</span></span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\"><span style=\"font-weight: bolder;\">Về Nông trại thanh long hữu cơ Kim Hải:</span></span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Thành lập từ năm 2007 &nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Quy mô: 80 hecta&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Địa điểm: Xã Tà Mon, Huyện Hàm Thuận Nam, Tỉnh Bình Thuận&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Trang trai mô hình kiểu mẩu của tỉnh Bình Thuận&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Chứng nhận: USDA Organic ( 2022)</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Sản lượng: 1000 tấn thanh long ruột đỏ và ruột trắng&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Thị trượng xuất khẩu trái tươi: Trung Quốc, Mỹ và Châu Âu&nbsp;</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Nhà máy chế biến các sản phẩm từ thanh long xây dựng theo tiêu chuẩn HACCP và đặt tại trang trại</span></p><p style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif;\"><span style=\"font-size: 12px;\">Thanh long hữu cơ Kim Hải tại Việt Nam&nbsp;được&nbsp;<span style=\"font-weight: bolder;\"><a href=\"https://organicfood.vn/\" style=\"color: var(--text-color); box-shadow: none; outline: none !important;\">Organicfood</a></span>&nbsp;phân phối độc quyền.</span></p>', 2, 80000, NULL, 0, 1, '2023-09-14 03:44:35', 'thanh-long-trang-huu-co-organicfood-1kg-71144', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `path`) VALUES
(22, 9, 'php53EF68985.jpg'),
(23, 9, 'php53F078663.jpg'),
(24, 9, 'php53F162991.jpg'),
(25, 10, 'php694522626.jpg'),
(26, 10, 'php694678719.jpg'),
(27, 10, 'php694750909.jpg'),
(28, 11, 'php7BCE42835.jpg'),
(29, 11, 'php7BCF30683.jpg'),
(30, 11, 'php7BD052219.jpg'),
(31, 12, 'php552049613.jpg'),
(32, 12, 'php552174751.jpg'),
(33, 12, 'php552257270.jpg'),
(34, 13, 'phpFCAD98845.jpg'),
(35, 13, 'phpFCAE28544.jpg'),
(36, 13, 'phpFCBF84862.jpg'),
(37, 14, 'php2EB74749.jpg'),
(38, 14, 'php2EC40613.jpg'),
(39, 14, 'php2FD12522.jpg'),
(40, 15, 'phpAF349041.jpg'),
(41, 15, 'phpAF427972.jpg'),
(42, 15, 'phpAF534072.jpg'),
(43, 16, 'php2E8797801.jpg'),
(44, 16, 'php2E8819362.jpg'),
(45, 16, 'php2E8956136.jpg'),
(46, 17, 'phpE4A639932.jpg'),
(47, 17, 'phpE4A736189.jpg'),
(48, 17, 'phpE4A892354.jpg'),
(49, 18, 'phpFAC868581.jpg'),
(50, 18, 'phpFAC982467.jpg'),
(51, 18, 'phpFACA16533.jpg'),
(52, 19, 'phpA75253127.jpg'),
(53, 19, 'phpA75394812.jpg'),
(54, 19, 'phpA75418472.jpg'),
(55, 20, 'phpBC5A15716.jpg'),
(56, 20, 'phpBC5B86394.jpg'),
(57, 20, 'phpBC5C18763.jpg'),
(58, 21, 'php15B331762.jpg'),
(59, 21, 'php15B426716.jpg'),
(60, 21, 'php15B571742.jpg'),
(61, 22, 'phpA47F64887.jpg'),
(62, 22, 'phpA48029852.jpg'),
(63, 22, 'phpA48166527.jpg'),
(64, 23, 'php504A98895.jpg'),
(65, 23, 'php504B98842.jpg'),
(66, 23, 'php504C50856.jpg'),
(67, 24, 'phpBF3F52978.jpg'),
(68, 24, 'phpBF4086273.jpg'),
(69, 24, 'phpBF4150121.jpg'),
(70, 25, 'phpD5D46825.jpg'),
(71, 25, 'phpD5E47479.jpg'),
(72, 25, 'phpD5F48642.jpg'),
(73, 26, 'phpFD7822153.jpg'),
(74, 26, 'phpFD7952880.jpg'),
(75, 26, 'phpFD7A43575.jpg'),
(76, 27, 'phpFC6F81603.jpg'),
(77, 27, 'phpFC7028526.jpg'),
(78, 27, 'phpFC7122012.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippers`
--

CREATE TABLE `shippers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` int(5) NOT NULL,
  `district` int(5) NOT NULL,
  `ward` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shippers`
--

INSERT INTO `shippers` (`id`, `name`, `phone`, `address`, `city`, `district`, `ward`) VALUES
(1, 'Tấn Lộc', '0123332220', 'hoàng diệu', 48, 493, 20278),
(2, 'Nam Khoa', '0272898227', 'ngô quyền', 46, 476, 19852);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `level` int(1) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `district` int(5) DEFAULT NULL,
  `ward` int(6) DEFAULT NULL,
  `city` int(5) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birthdate`, `level`, `address`, `district`, `ward`, `city`, `password`, `remember_token`, `create_date`, `email_verified_at`) VALUES
(1, 'Trần Lý Thắng', 'abc@gmail.com', '0926069058', NULL, 0, 'k572/72 ông ích khiêm', NULL, NULL, NULL, '$2y$10$vyQydFQyUc6qrqy0ZdmJXe3IiwRoRPHUZNPjbzG0Gs3nJ2oP5YAY.', NULL, NULL, NULL),
(3, 'Nguyễn Văn A', 'abcd@gmail.com', '0243220339', NULL, 0, 'hoàng diệu', NULL, NULL, NULL, '$2y$10$vyQydFQyUc6qrqy0ZdmJXe3IiwRoRPHUZNPjbzG0Gs3nJ2oP5YAY.', NULL, NULL, NULL),
(4, 'Trần Văn B', 'abc1@gmail.com', '0926069058', NULL, 0, NULL, 476, 19852, 46, '$2y$10$vyQydFQyUc6qrqy0ZdmJXe3IiwRoRPHUZNPjbzG0Gs3nJ2oP5YAY.', 'yvJfc3QnbqIX9nWmCab3WmCo2S04bNFlxu66WEcWvXHRqXfOnea7ZvigIfCY', NULL, NULL),
(5, 'Thắng Trần', 'admin@gmail.com', '0223310339', NULL, 1, 'Hoàng diệu', NULL, NULL, NULL, 'ed2b1f468c5f915f3f1cf75d7068baae', 'Wgzq1KPwK8uCXCuchEYVoASEKjOxR10qWQrHdNcxqyrxRfo0j5GW82EycvAv', NULL, NULL),
(15, 'Trần Lý Thắng', 'thang281201@gmail.com', '0926069055', NULL, 0, 'Ông Ích Khiêm', 476, 19831, 46, '$2y$10$yjySpxUogGNYjMibe1uBq.rNLtZXFQU3WA5Doz9h5PeRtjbw8KWEu', 'FjiFZxHJPhhR5RTBBOaJl5i0FMMuhAWVyh2pyWywdCDZ3JXEiB9OcISLHEb8', '2023-09-12 01:37:57', NULL),
(16, 'Ngô Văn Thắng', 'thang@gmail.com', '0278577589', NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$TjA0neiAQwbAH1uDfVmCR.b8X5yH83ilz4kfM1ili65gN5z9sasXK', NULL, '2023-09-13 13:04:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wards`
--

CREATE TABLE `wards` (
  `id` int(6) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `district_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `wards`
--

INSERT INTO `wards` (`id`, `name`, `type`, `district_id`) VALUES
(19330, 'Phường Đông Giang', 'Phường', 461),
(19333, 'Phường 1', 'Phường', 461),
(19336, 'Phường Đông Lễ', 'Phường', 461),
(19339, 'Phường Đông Thanh', 'Phường', 461),
(19342, 'Phường 2', 'Phường', 461),
(19345, 'Phường 4', 'Phường', 461),
(19348, 'Phường 5', 'Phường', 461),
(19351, 'Phường Đông Lương', 'Phường', 461),
(19354, 'Phường 3', 'Phường', 461),
(19357, 'Phường 1', 'Phường', 462),
(19358, 'Phường An Đôn', 'Phường', 462),
(19360, 'Phường 2', 'Phường', 462),
(19361, 'Phường 3', 'Phường', 462),
(19363, 'Thị trấn Hồ Xá', 'Thị trấn', 464),
(19366, 'Thị trấn Bến Quan', 'Thị trấn', 464),
(19369, 'Xã Vĩnh Thái', 'Xã', 464),
(19372, 'Xã Vĩnh Tú', 'Xã', 464),
(19375, 'Xã Vĩnh Chấp', 'Xã', 464),
(19378, 'Xã Vĩnh Trung', 'Xã', 464),
(19381, 'Xã Vĩnh Kim', 'Xã', 464),
(19384, 'Xã Vĩnh Thạch', 'Xã', 464),
(19387, 'Xã Vĩnh Long', 'Xã', 464),
(19390, 'Xã Vĩnh Nam', 'Xã', 464),
(19393, 'Xã Vĩnh Khê', 'Xã', 464),
(19396, 'Xã Vĩnh Hòa', 'Xã', 464),
(19399, 'Xã Vĩnh Hiền', 'Xã', 464),
(19402, 'Xã Vĩnh Thủy', 'Xã', 464),
(19405, 'Xã Vĩnh Lâm', 'Xã', 464),
(19408, 'Xã Vĩnh Thành', 'Xã', 464),
(19411, 'Xã Vĩnh Tân', 'Xã', 464),
(19414, 'Thị trấn Cửa Tùng', 'Thị trấn', 464),
(19417, 'Xã Vĩnh Hà', 'Xã', 464),
(19420, 'Xã Vĩnh Sơn', 'Xã', 464),
(19423, 'Xã Vĩnh Giang', 'Xã', 464),
(19426, 'Xã Vĩnh Ô', 'Xã', 464),
(19429, 'Thị trấn Khe Sanh', 'Thị trấn', 465),
(19432, 'Thị trấn Lao Bảo', 'Thị trấn', 465),
(19435, 'Xã Hướng Lập', 'Xã', 465),
(19438, 'Xã Hướng Việt', 'Xã', 465),
(19441, 'Xã Hướng Phùng', 'Xã', 465),
(19444, 'Xã Hướng Sơn', 'Xã', 465),
(19447, 'Xã Hướng Linh', 'Xã', 465),
(19450, 'Xã Tân Hợp', 'Xã', 465),
(19453, 'Xã Hướng Tân', 'Xã', 465),
(19456, 'Xã Tân Thành', 'Xã', 465),
(19459, 'Xã Tân Long', 'Xã', 465),
(19462, 'Xã Tân Lập', 'Xã', 465),
(19465, 'Xã Tân Liên', 'Xã', 465),
(19468, 'Xã Húc', 'Xã', 465),
(19471, 'Xã Thuận', 'Xã', 465),
(19474, 'Xã Hướng Lộc', 'Xã', 465),
(19477, 'Xã Ba Tầng', 'Xã', 465),
(19480, 'Xã Thanh', 'Xã', 465),
(19483, 'Xã  A Dơi', 'Xã', 465),
(19486, 'Xã A Xing', 'Xã', 465),
(19489, 'Xã A Túc', 'Xã', 465),
(19492, 'Xã Xy', 'Xã', 465),
(19495, 'Thị trấn Gio Linh', 'Thị trấn', 466),
(19496, 'Thị trấn Cửa Việt', 'Thị trấn', 466),
(19498, 'Xã Trung Giang', 'Xã', 466),
(19501, 'Xã Trung Hải', 'Xã', 466),
(19504, 'Xã Trung Sơn', 'Xã', 466),
(19507, 'Xã Gio Phong', 'Xã', 466),
(19510, 'Xã Gio Mỹ', 'Xã', 466),
(19513, 'Xã Vĩnh Trường', 'Xã', 466),
(19516, 'Xã Gio Bình', 'Xã', 466),
(19519, 'Xã Gio Hải', 'Xã', 466),
(19522, 'Xã Gio An', 'Xã', 466),
(19525, 'Xã Gio Châu', 'Xã', 466),
(19528, 'Xã Gio Thành', 'Xã', 466),
(19531, 'Xã Gio Việt', 'Xã', 466),
(19534, 'Xã Linh Thượng', 'Xã', 466),
(19537, 'Xã Gio Sơn', 'Xã', 466),
(19540, 'Xã Gio Hòa', 'Xã', 466),
(19543, 'Xã Gio Mai', 'Xã', 466),
(19546, 'Xã Hải Thái', 'Xã', 466),
(19549, 'Xã Linh Hải', 'Xã', 466),
(19552, 'Xã Gio Quang', 'Xã', 466),
(19555, 'Thị trấn Krông Klang', 'Thị trấn', 467),
(19558, 'Xã Mò Ó', 'Xã', 467),
(19561, 'Xã Hướng Hiệp', 'Xã', 467),
(19564, 'Xã Đa Krông', 'Xã', 467),
(19567, 'Xã Triệu Nguyên', 'Xã', 467),
(19570, 'Xã Ba Lòng', 'Xã', 467),
(19573, 'Xã Hải Phúc', 'Xã', 467),
(19576, 'Xã Ba Nang', 'Xã', 467),
(19579, 'Xã Tà Long', 'Xã', 467),
(19582, 'Xã Húc Nghì', 'Xã', 467),
(19585, 'Xã A Vao', 'Xã', 467),
(19588, 'Xã Tà Rụt', 'Xã', 467),
(19591, 'Xã A Bung', 'Xã', 467),
(19594, 'Xã A Ngo', 'Xã', 467),
(19597, 'Thị trấn Cam Lộ', 'Thị trấn', 468),
(19600, 'Xã Cam Tuyền', 'Xã', 468),
(19603, 'Xã Cam An', 'Xã', 468),
(19606, 'Xã Cam Thủy', 'Xã', 468),
(19609, 'Xã Cam Thanh', 'Xã', 468),
(19612, 'Xã Cam Thành', 'Xã', 468),
(19615, 'Xã Cam Hiếu', 'Xã', 468),
(19618, 'Xã Cam Chính', 'Xã', 468),
(19621, 'Xã Cam Nghĩa', 'Xã', 468),
(19624, 'Thị Trấn Ái Tử', 'Thị trấn', 469),
(19627, 'Xã Triệu An', 'Xã', 469),
(19630, 'Xã Triệu Vân', 'Xã', 469),
(19633, 'Xã Triệu Phước', 'Xã', 469),
(19636, 'Xã Triệu Độ', 'Xã', 469),
(19639, 'Xã Triệu Trạch', 'Xã', 469),
(19642, 'Xã Triệu Thuận', 'Xã', 469),
(19645, 'Xã Triệu Đại', 'Xã', 469),
(19648, 'Xã Triệu Hòa', 'Xã', 469),
(19651, 'Xã Triệu Lăng', 'Xã', 469),
(19654, 'Xã Triệu Sơn', 'Xã', 469),
(19657, 'Xã Triệu Long', 'Xã', 469),
(19660, 'Xã Triệu Tài', 'Xã', 469),
(19663, 'Xã Triệu Đông', 'Xã', 469),
(19666, 'Xã Triệu Trung', 'Xã', 469),
(19669, 'Xã Triệu Ái', 'Xã', 469),
(19672, 'Xã Triệu Thượng', 'Xã', 469),
(19675, 'Xã Triệu Giang', 'Xã', 469),
(19678, 'Xã Triệu Thành', 'Xã', 469),
(19681, 'Thị trấn Hải Lăng', 'Thị trấn', 470),
(19684, 'Xã Hải An', 'Xã', 470),
(19687, 'Xã Hải Ba', 'Xã', 470),
(19690, 'Xã Hải Xuân', 'Xã', 470),
(19693, 'Xã Hải Quy', 'Xã', 470),
(19696, 'Xã Hải Quế', 'Xã', 470),
(19699, 'Xã Hải Vĩnh', 'Xã', 470),
(19702, 'Xã Hải Phú', 'Xã', 470),
(19705, 'Xã Hải Lệ', 'Xã', 462),
(19708, 'Xã Hải Thượng', 'Xã', 470),
(19711, 'Xã Hải Dương', 'Xã', 470),
(19714, 'Xã Hải Thiện', 'Xã', 470),
(19717, 'Xã Hải Lâm', 'Xã', 470),
(19720, 'Xã Hải Thành', 'Xã', 470),
(19723, 'Xã Hải Hòa', 'Xã', 470),
(19726, 'Xã Hải Tân', 'Xã', 470),
(19729, 'Xã Hải Trường', 'Xã', 470),
(19732, 'Xã Hải Thọ', 'Xã', 470),
(19735, 'Xã Hải Sơn', 'Xã', 470),
(19738, 'Xã Hải Chánh', 'Xã', 470),
(19741, 'Xã Hải Khê', 'Xã', 470),
(19744, 'Phường Phú Thuận', 'Phường', 474),
(19747, 'Phường Phú Bình', 'Phường', 474),
(19750, 'Phường Tây Lộc', 'Phường', 474),
(19753, 'Phường Thuận Lộc', 'Phường', 474),
(19756, 'Phường Phú Hiệp', 'Phường', 474),
(19759, 'Phường Phú Hậu', 'Phường', 474),
(19762, 'Phường Thuận Hòa', 'Phường', 474),
(19765, 'Phường Thuận Thành', 'Phường', 474),
(19768, 'Phường Phú Hòa', 'Phường', 474),
(19771, 'Phường Phú Cát', 'Phường', 474),
(19774, 'Phường Kim Long', 'Phường', 474),
(19777, 'Phường Vĩ Dạ', 'Phường', 474),
(19780, 'Phường Phường Đúc', 'Phường', 474),
(19783, 'Phường Vĩnh Ninh', 'Phường', 474),
(19786, 'Phường Phú Hội', 'Phường', 474),
(19789, 'Phường Phú Nhuận', 'Phường', 474),
(19792, 'Phường Xuân Phú', 'Phường', 474),
(19795, 'Phường Trường An', 'Phường', 474),
(19798, 'Phường Phước Vĩnh', 'Phường', 474),
(19801, 'Phường An Cựu', 'Phường', 474),
(19803, 'Phường An Hòa', 'Phường', 474),
(19804, 'Phường Hương Sơ', 'Phường', 474),
(19807, 'Phường Thuỷ Biều', 'Phường', 474),
(19810, 'Phường Hương Long', 'Phường', 474),
(19813, 'Phường Thuỷ Xuân', 'Phường', 474),
(19815, 'Phường An Đông', 'Phường', 474),
(19816, 'Phường An Tây', 'Phường', 474),
(19819, 'Thị trấn Phong Điền', 'Thị trấn', 476),
(19822, 'Xã Điền Hương', 'Xã', 476),
(19825, 'Xã Điền Môn', 'Xã', 476),
(19828, 'Xã Điền Lộc', 'Xã', 476),
(19831, 'Xã Phong Bình', 'Xã', 476),
(19834, 'Xã Điền Hòa', 'Xã', 476),
(19837, 'Xã Phong Chương', 'Xã', 476),
(19840, 'Xã Phong Hải', 'Xã', 476),
(19843, 'Xã Điền Hải', 'Xã', 476),
(19846, 'Xã Phong Hòa', 'Xã', 476),
(19849, 'Xã Phong Thu', 'Xã', 476),
(19852, 'Xã Phong Hiền', 'Xã', 476),
(19855, 'Xã Phong Mỹ', 'Xã', 476),
(19858, 'Xã Phong An', 'Xã', 476),
(19861, 'Xã Phong Xuân', 'Xã', 476),
(19864, 'Xã Phong Sơn', 'Xã', 476),
(19867, 'Thị trấn Sịa', 'Thị trấn', 477),
(19870, 'Xã Quảng Thái', 'Xã', 477),
(19873, 'Xã Quảng Ngạn', 'Xã', 477),
(19876, 'Xã Quảng Lợi', 'Xã', 477),
(19879, 'Xã Quảng Công', 'Xã', 477),
(19882, 'Xã Quảng Phước', 'Xã', 477),
(19885, 'Xã Quảng Vinh', 'Xã', 477),
(19888, 'Xã Quảng An', 'Xã', 477),
(19891, 'Xã Quảng Thành', 'Xã', 477),
(19894, 'Xã Quảng Thọ', 'Xã', 477),
(19897, 'Xã Quảng Phú', 'Xã', 477),
(19900, 'Thị trấn Thuận An', 'Thị trấn', 478),
(19903, 'Xã Phú Thuận', 'Xã', 478),
(19906, 'Xã Phú Dương', 'Xã', 478),
(19909, 'Xã Phú Mậu', 'Xã', 478),
(19912, 'Xã Phú An', 'Xã', 478),
(19915, 'Xã Phú Hải', 'Xã', 478),
(19918, 'Xã Phú Xuân', 'Xã', 478),
(19921, 'Xã Phú Diên', 'Xã', 478),
(19924, 'Xã Phú Thanh', 'Xã', 478),
(19927, 'Xã Phú Mỹ', 'Xã', 478),
(19930, 'Xã Phú Thượng', 'Xã', 478),
(19933, 'Xã Phú Hồ', 'Xã', 478),
(19936, 'Xã Vinh Xuân', 'Xã', 478),
(19939, 'Xã Phú Lương', 'Xã', 478),
(19942, 'Thị trấn Phú Đa', 'Thị trấn', 478),
(19945, 'Xã Vinh Thanh', 'Xã', 478),
(19948, 'Xã Vinh An', 'Xã', 478),
(19951, 'Xã Vinh Phú', 'Xã', 478),
(19954, 'Xã Vinh Thái', 'Xã', 478),
(19957, 'Xã Vinh Hà', 'Xã', 478),
(19960, 'Phường Phú Bài', 'Phường', 479),
(19963, 'Xã Thủy Vân', 'Xã', 479),
(19966, 'Xã Thủy Thanh', 'Xã', 479),
(19969, 'Phường Thủy Dương', 'Phường', 479),
(19972, 'Phường Thủy Phương', 'Phường', 479),
(19975, 'Phường Thủy Châu', 'Phường', 479),
(19978, 'Phường Thủy Lương', 'Phường', 479),
(19981, 'Xã Thủy Bằng', 'Xã', 479),
(19984, 'Xã Thủy Tân', 'Xã', 479),
(19987, 'Xã Thủy Phù', 'Xã', 479),
(19990, 'Xã Phú Sơn', 'Xã', 479),
(19993, 'Xã Dương Hòa', 'Xã', 479),
(19996, 'Phường Tứ Hạ', 'Phường', 480),
(19999, 'Xã Hải Dương', 'Xã', 480),
(20002, 'Xã Hương Phong', 'Xã', 480),
(20005, 'Xã Hương Toàn', 'Xã', 480),
(20008, 'Phường Hương Vân', 'Phường', 480),
(20011, 'Phường Hương Văn', 'Phường', 480),
(20014, 'Xã Hương Vinh', 'Xã', 480),
(20017, 'Phường Hương Xuân', 'Phường', 480),
(20020, 'Phường Hương Chữ', 'Phường', 480),
(20023, 'Phường Hương An', 'Phường', 480),
(20026, 'Xã Hương Bình', 'Xã', 480),
(20029, 'Phường Hương Hồ', 'Phường', 480),
(20032, 'Xã Hương Thọ', 'Xã', 480),
(20035, 'Xã Bình Điền', 'Xã', 480),
(20038, 'Xã Hồng Tiến', 'Xã', 480),
(20041, 'Xã Bình Thành', 'Xã', 480),
(20044, 'Thị trấn A Lưới', 'Thị trấn', 481),
(20047, 'Xã Hồng Vân', 'Xã', 481),
(20050, 'Xã Hồng Hạ', 'Xã', 481),
(20053, 'Xã Hồng Kim', 'Xã', 481),
(20056, 'Xã Hồng Trung', 'Xã', 481),
(20059, 'Xã Hương Nguyên', 'Xã', 481),
(20062, 'Xã Bắc Sơn', 'Xã', 481),
(20065, 'Xã Hồng Bắc', 'Xã', 481),
(20068, 'Xã A Ngo', 'Xã', 481),
(20071, 'Xã Sơn Thủy', 'Xã', 481),
(20074, 'Xã Phú Vinh', 'Xã', 481),
(20077, 'Xã Hồng Quảng', 'Xã', 481),
(20080, 'Xã Hương Phong', 'Xã', 481),
(20083, 'Xã Nhâm', 'Xã', 481),
(20086, 'Xã Hồng Thượng', 'Xã', 481),
(20089, 'Xã Hồng Thái', 'Xã', 481),
(20092, 'Xã Hương Lâm', 'Xã', 481),
(20095, 'Xã A Roằng', 'Xã', 481),
(20098, 'Xã Đông Sơn', 'Xã', 481),
(20101, 'Xã A Đớt', 'Xã', 481),
(20104, 'Xã Hồng Thủy', 'Xã', 481),
(20107, 'Thị trấn Phú Lộc', 'Thị trấn', 482),
(20110, 'Thị trấn Lăng Cô', 'Thị trấn', 482),
(20113, 'Xã Vinh Mỹ', 'Xã', 482),
(20116, 'Xã Vinh Hưng', 'Xã', 482),
(20119, 'Xã Vinh Hải', 'Xã', 482),
(20122, 'Xã Vinh Giang', 'Xã', 482),
(20125, 'Xã Vinh Hiền', 'Xã', 482),
(20128, 'Xã Lộc Bổn', 'Xã', 482),
(20131, 'Xã Lộc Sơn', 'Xã', 482),
(20134, 'Xã Lộc Bình', 'Xã', 482),
(20137, 'Xã Lộc Vĩnh', 'Xã', 482),
(20140, 'Xã Lộc An', 'Xã', 482),
(20143, 'Xã Lộc Điền', 'Xã', 482),
(20146, 'Xã Lộc Thủy', 'Xã', 482),
(20149, 'Xã Lộc Trì', 'Xã', 482),
(20152, 'Xã Lộc Tiến', 'Xã', 482),
(20155, 'Xã Lộc Hòa', 'Xã', 482),
(20158, 'Xã Xuân Lộc', 'Xã', 482),
(20161, 'Thị trấn Khe Tre', 'Thị trấn', 483),
(20164, 'Xã Hương Phú', 'Xã', 483),
(20167, 'Xã Hương Sơn', 'Xã', 483),
(20170, 'Xã Hương Lộc', 'Xã', 483),
(20173, 'Xã Thượng Quảng', 'Xã', 483),
(20176, 'Xã Hương Hòa', 'Xã', 483),
(20179, 'Xã Hương Giang', 'Xã', 483),
(20182, 'Xã Hương Hữu', 'Xã', 483),
(20185, 'Xã Thượng Lộ', 'Xã', 483),
(20188, 'Xã Thượng Long', 'Xã', 483),
(20191, 'Xã Thượng Nhật', 'Xã', 483),
(20194, 'Phường Hòa Hiệp Bắc', 'Phường', 490),
(20195, 'Phường Hòa Hiệp Nam', 'Phường', 490),
(20197, 'Phường Hòa Khánh Bắc', 'Phường', 490),
(20198, 'Phường Hòa Khánh Nam', 'Phường', 490),
(20200, 'Phường Hòa Minh', 'Phường', 490),
(20203, 'Phường Tam Thuận', 'Phường', 491),
(20206, 'Phường Thanh Khê Tây', 'Phường', 491),
(20207, 'Phường Thanh Khê Đông', 'Phường', 491),
(20209, 'Phường Xuân Hà', 'Phường', 491),
(20212, 'Phường Tân Chính', 'Phường', 491),
(20215, 'Phường Chính Gián', 'Phường', 491),
(20218, 'Phường Vĩnh Trung', 'Phường', 491),
(20221, 'Phường Thạc Gián', 'Phường', 491),
(20224, 'Phường An Khê', 'Phường', 491),
(20225, 'Phường Hòa Khê', 'Phường', 491),
(20227, 'Phường Thanh Bình', 'Phường', 492),
(20230, 'Phường Thuận Phước', 'Phường', 492),
(20233, 'Phường Thạch Thang', 'Phường', 492),
(20236, 'Phường Hải Châu  I', 'Phường', 492),
(20239, 'Phường Hải Châu II', 'Phường', 492),
(20242, 'Phường Phước Ninh', 'Phường', 492),
(20245, 'Phường Hòa Thuận Tây', 'Phường', 492),
(20246, 'Phường Hòa Thuận Đông', 'Phường', 492),
(20248, 'Phường Nam Dương', 'Phường', 492),
(20251, 'Phường Bình Hiên', 'Phường', 492),
(20254, 'Phường Bình Thuận', 'Phường', 492),
(20257, 'Phường Hòa Cường Bắc', 'Phường', 492),
(20258, 'Phường Hòa Cường Nam', 'Phường', 492),
(20260, 'Phường Khuê Trung', 'Phường', 495),
(20263, 'Phường Thọ Quang', 'Phường', 493),
(20266, 'Phường Nại Hiên Đông', 'Phường', 493),
(20269, 'Phường Mân Thái', 'Phường', 493),
(20272, 'Phường An Hải Bắc', 'Phường', 493),
(20275, 'Phường Phước Mỹ', 'Phường', 493),
(20278, 'Phường An Hải Tây', 'Phường', 493),
(20281, 'Phường An Hải Đông', 'Phường', 493),
(20284, 'Phường Mỹ An', 'Phường', 494),
(20285, 'Phường Khuê Mỹ', 'Phường', 494),
(20287, 'Phường Hoà Quý', 'Phường', 494),
(20290, 'Phường Hoà Hải', 'Phường', 494),
(20293, 'Xã Hòa Bắc', 'Xã', 497),
(20296, 'Xã Hòa Liên', 'Xã', 497),
(20299, 'Xã Hòa Ninh', 'Xã', 497),
(20302, 'Xã Hòa Sơn', 'Xã', 497),
(20305, 'Phường Hòa Phát', 'Phường', 495),
(20306, 'Phường Hòa An', 'Phường', 495),
(20308, 'Xã Hòa Nhơn', 'Xã', 497),
(20311, 'Phường Hòa Thọ Tây', 'Phường', 495),
(20312, 'Phường Hòa Thọ Đông', 'Phường', 495),
(20314, 'Phường Hòa Xuân', 'Phường', 495),
(20317, 'Xã Hòa Phú', 'Xã', 497),
(20320, 'Xã Hòa Phong', 'Xã', 497),
(20323, 'Xã Hòa Châu', 'Xã', 497),
(20326, 'Xã Hòa Tiến', 'Xã', 497),
(20329, 'Xã Hòa Phước', 'Xã', 497),
(20332, 'Xã Hòa Khương', 'Xã', 497),
(20335, 'Phường Tân Thạnh', 'Phường', 502),
(20338, 'Phường Phước Hòa', 'Phường', 502),
(20341, 'Phường An Mỹ', 'Phường', 502),
(20344, 'Phường Hòa Hương', 'Phường', 502),
(20347, 'Phường An Xuân', 'Phường', 502),
(20350, 'Phường An Sơn', 'Phường', 502),
(20353, 'Phường Trường Xuân', 'Phường', 502),
(20356, 'Phường An Phú', 'Phường', 502),
(20359, 'Xã Tam Thanh', 'Xã', 502),
(20362, 'Xã Tam Thăng', 'Xã', 502),
(20364, 'Thị trấn Phú Thịnh', 'Thị trấn', 518),
(20365, 'Xã Tam Thành', 'Xã', 518),
(20368, 'Xã Tam An', 'Xã', 518),
(20371, 'Xã Tam Phú', 'Xã', 502),
(20374, 'Xã Tam Đàn', 'Xã', 518),
(20375, 'Phường Hoà Thuận', 'Phường', 502),
(20377, 'Xã Tam Lộc', 'Xã', 518),
(20380, 'Xã Tam Phước', 'Xã', 518),
(20383, 'Xã Tam Vinh', 'Xã', 518),
(20386, 'Xã Tam Thái', 'Xã', 518),
(20387, 'Xã Tam Đại', 'Xã', 518),
(20389, 'Xã Tam Ngọc', 'Xã', 502),
(20392, 'Xã Tam Dân', 'Xã', 518),
(20395, 'Xã Tam Lãnh', 'Xã', 518),
(20398, 'Phường Minh An', 'Phường', 503),
(20401, 'Phường Tân An', 'Phường', 503),
(20404, 'Phường Cẩm Phô', 'Phường', 503),
(20407, 'Phường Thanh Hà', 'Phường', 503),
(20410, 'Phường Sơn Phong', 'Phường', 503),
(20413, 'Phường Cẩm Châu', 'Phường', 503),
(20416, 'Phường Cửa Đại', 'Phường', 503),
(20419, 'Phường Cẩm An', 'Phường', 503),
(20422, 'Xã Cẩm Hà', 'Xã', 503),
(20425, 'Xã Cẩm Kim', 'Xã', 503),
(20428, 'Phường Cẩm Nam', 'Phường', 503),
(20431, 'Xã Cẩm Thanh', 'Xã', 503),
(20434, 'Xã Tân Hiệp', 'Xã', 503),
(20437, 'Xã Ch\'ơm', 'Xã', 504),
(20440, 'Xã Ga Ri', 'Xã', 504),
(20443, 'Xã A Xan', 'Xã', 504),
(20446, 'Xã Tr\'Hy', 'Xã', 504),
(20449, 'Xã Lăng', 'Xã', 504),
(20452, 'Xã A Nông', 'Xã', 504),
(20455, 'Xã A Tiêng', 'Xã', 504),
(20458, 'Xã Bha Lê', 'Xã', 504),
(20461, 'Xã A Vương', 'Xã', 504),
(20464, 'Xã Dang', 'Xã', 504),
(20467, 'Thị trấn P Rao', 'Thị trấn', 505),
(20470, 'Xã Tà Lu', 'Xã', 505),
(20473, 'Xã Sông Kôn', 'Xã', 505),
(20476, 'Xã Jơ Ngây', 'Xã', 505),
(20479, 'Xã A Ting', 'Xã', 505),
(20482, 'Xã  Tư', 'Xã', 505),
(20485, 'Xã Ba', 'Xã', 505),
(20488, 'Xã A Rooi', 'Xã', 505),
(20491, 'Xã Za Hung', 'Xã', 505),
(20494, 'Xã Mà Cooi', 'Xã', 505),
(20497, 'Xã Ka Dăng', 'Xã', 505),
(20500, 'Thị Trấn Ái Nghĩa', 'Thị trấn', 506),
(20503, 'Xã Đại Sơn', 'Xã', 506),
(20506, 'Xã Đại Lãnh', 'Xã', 506),
(20509, 'Xã Đại Hưng', 'Xã', 506),
(20512, 'Xã Đại Hồng', 'Xã', 506),
(20515, 'Xã Đại Đồng', 'Xã', 506),
(20518, 'Xã Đại Quang', 'Xã', 506),
(20521, 'Xã Đại Nghĩa', 'Xã', 506),
(20524, 'Xã Đại Hiệp', 'Xã', 506),
(20527, 'Xã Đại Thạnh', 'Xã', 506),
(20530, 'Xã Đại Chánh', 'Xã', 506),
(20533, 'Xã Đại Tân', 'Xã', 506),
(20536, 'Xã Đại Phong', 'Xã', 506),
(20539, 'Xã Đại Minh', 'Xã', 506),
(20542, 'Xã Đại Thắng', 'Xã', 506),
(20545, 'Xã Đại Cường', 'Xã', 506),
(20547, 'Xã Đại An', 'Xã', 506),
(20548, 'Xã Đại Hòa', 'Xã', 506),
(20551, 'Phường Vĩnh Điện', 'Phường', 507),
(20554, 'Xã Điện Tiến', 'Xã', 507),
(20557, 'Xã Điện Hòa', 'Xã', 507),
(20560, 'Xã Điện Thắng Bắc', 'Xã', 507),
(20561, 'Xã Điện Thắng Trung', 'Xã', 507),
(20562, 'Xã Điện Thắng Nam', 'Xã', 507),
(20563, 'Phường Điện Ngọc', 'Phường', 507),
(20566, 'Xã Điện Hồng', 'Xã', 507),
(20569, 'Xã Điện Thọ', 'Xã', 507),
(20572, 'Xã Điện Phước', 'Xã', 507),
(20575, 'Phường Điện An', 'Phường', 507),
(20578, 'Phường Điện Nam Bắc', 'Phường', 507),
(20579, 'Phường Điện Nam Trung', 'Phường', 507),
(20580, 'Phường Điện Nam Đông', 'Phường', 507),
(20581, 'Phường Điện Dương', 'Phường', 507),
(20584, 'Xã Điện Quang', 'Xã', 507),
(20587, 'Xã Điện Trung', 'Xã', 507),
(20590, 'Xã Điện Phong', 'Xã', 507),
(20593, 'Xã Điện Minh', 'Xã', 507),
(20596, 'Xã Điện Phương', 'Xã', 507),
(20599, 'Thị trấn Nam Phước', 'Thị trấn', 508),
(20602, 'Xã Duy Thu', 'Xã', 508),
(20605, 'Xã Duy Phú', 'Xã', 508),
(20608, 'Xã Duy Tân', 'Xã', 508),
(20611, 'Xã Duy Hòa', 'Xã', 508),
(20614, 'Xã Duy Châu', 'Xã', 508),
(20617, 'Xã Duy Trinh', 'Xã', 508),
(20620, 'Xã Duy Sơn', 'Xã', 508),
(20623, 'Xã Duy Trung', 'Xã', 508),
(20626, 'Xã Duy Phước', 'Xã', 508),
(20629, 'Xã Duy Thành', 'Xã', 508),
(20632, 'Xã Duy Vinh', 'Xã', 508),
(20635, 'Xã Duy Nghĩa', 'Xã', 508),
(20638, 'Xã Duy Hải', 'Xã', 508),
(20641, 'Thị trấn Đông Phú', 'Thị trấn', 509),
(20644, 'Xã Quế Xuân 1', 'Xã', 509),
(20647, 'Xã Quế Xuân 2', 'Xã', 509),
(20650, 'Xã Quế Phú', 'Xã', 509),
(20651, 'Xã Hương An', 'Xã', 509),
(20653, 'Xã Quế Cường', 'Xã', 509),
(20656, 'Xã Quế Trung', 'Xã', 519),
(20659, 'Xã Quế Hiệp', 'Xã', 509),
(20662, 'Xã Quế Thuận', 'Xã', 509),
(20665, 'Xã Phú Thọ', 'Xã', 509),
(20668, 'Xã Quế Ninh', 'Xã', 519),
(20669, 'Xã Phước Ninh', 'Xã', 519),
(20671, 'Xã Quế Lộc', 'Xã', 519),
(20672, 'Xã Sơn Viên', 'Xã', 519),
(20674, 'Xã Quế Phước', 'Xã', 519),
(20677, 'Xã Quế Long', 'Xã', 509),
(20680, 'Xã Quế Châu', 'Xã', 509),
(20683, 'Xã Quế Phong', 'Xã', 509),
(20686, 'Xã Quế An', 'Xã', 509),
(20689, 'Xã Quế Minh', 'Xã', 509),
(20692, 'Xã Quế Lâm', 'Xã', 519),
(20695, 'Thị trấn Thạnh Mỹ', 'Thị trấn', 510),
(20698, 'Xã Laêê', 'Xã', 510),
(20699, 'Xã Chơ Chun', 'Xã', 510),
(20701, 'Xã Zuôich', 'Xã', 510),
(20702, 'Xã Tà Pơơ', 'Xã', 510),
(20704, 'Xã La Dêê', 'Xã', 510),
(20705, 'Xã Đắc Tôi', 'Xã', 510),
(20707, 'Xã Chà Vàl', 'Xã', 510),
(20710, 'Xã Tà Bhinh', 'Xã', 510),
(20713, 'Xã Cà Dy', 'Xã', 510),
(20716, 'Xã Đắc Pre', 'Xã', 510),
(20719, 'Xã Đắc Pring', 'Xã', 510),
(20722, 'Thị trấn Khâm Đức', 'Thị trấn', 511),
(20725, 'Xã Phước Xuân', 'Xã', 511),
(20728, 'Xã Phước Hiệp', 'Xã', 511),
(20729, 'Xã Phước Hoà', 'Xã', 511),
(20731, 'Xã Phước Đức', 'Xã', 511),
(20734, 'Xã Phước Năng', 'Xã', 511),
(20737, 'Xã Phước Mỹ', 'Xã', 511),
(20740, 'Xã Phước Chánh', 'Xã', 511),
(20743, 'Xã Phước Công', 'Xã', 511),
(20746, 'Xã Phước Kim', 'Xã', 511),
(20749, 'Xã Phước Lộc', 'Xã', 511),
(20752, 'Xã Phước Thành', 'Xã', 511),
(20755, 'Thị trấn Tân An', 'Thị trấn', 512),
(20758, 'Xã Hiệp Hòa', 'Xã', 512),
(20761, 'Xã Hiệp Thuận', 'Xã', 512),
(20764, 'Xã Quế Thọ', 'Xã', 512),
(20767, 'Xã Bình Lâm', 'Xã', 512),
(20770, 'Xã Sông Trà', 'Xã', 512),
(20773, 'Xã Phước Trà', 'Xã', 512),
(20776, 'Xã Phước Gia', 'Xã', 512),
(20779, 'Xã Quế Bình', 'Xã', 512),
(20782, 'Xã Quế Lưu', 'Xã', 512),
(20785, 'Xã Thăng Phước', 'Xã', 512),
(20788, 'Xã Bình Sơn', 'Xã', 512),
(20791, 'Thị trấn Hà Lam', 'Thị trấn', 513),
(20794, 'Xã Bình Dương', 'Xã', 513),
(20797, 'Xã Bình Giang', 'Xã', 513),
(20800, 'Xã Bình Nguyên', 'Xã', 513),
(20803, 'Xã Bình Phục', 'Xã', 513),
(20806, 'Xã Bình Triều', 'Xã', 513),
(20809, 'Xã Bình Đào', 'Xã', 513),
(20812, 'Xã Bình Minh', 'Xã', 513),
(20815, 'Xã Bình Lãnh', 'Xã', 513),
(20818, 'Xã Bình Trị', 'Xã', 513),
(20821, 'Xã Bình Định Bắc', 'Xã', 513),
(20822, 'Xã Bình Định Nam', 'Xã', 513),
(20824, 'Xã Bình Quý', 'Xã', 513),
(20827, 'Xã Bình Phú', 'Xã', 513),
(20830, 'Xã Bình Chánh', 'Xã', 513),
(20833, 'Xã Bình Tú', 'Xã', 513),
(20836, 'Xã Bình Sa', 'Xã', 513),
(20839, 'Xã Bình Hải', 'Xã', 513),
(20842, 'Xã Bình Quế', 'Xã', 513),
(20845, 'Xã Bình An', 'Xã', 513),
(20848, 'Xã Bình Trung', 'Xã', 513),
(20851, 'Xã Bình Nam', 'Xã', 513),
(20854, 'Thị trấn Tiên Kỳ', 'Thị trấn', 514),
(20857, 'Xã Tiên Sơn', 'Xã', 514),
(20860, 'Xã Tiên Hà', 'Xã', 514),
(20863, 'Xã Tiên Cẩm', 'Xã', 514),
(20866, 'Xã Tiên Châu', 'Xã', 514),
(20869, 'Xã Tiên Lãnh', 'Xã', 514),
(20872, 'Xã Tiên Ngọc', 'Xã', 514),
(20875, 'Xã Tiên Hiệp', 'Xã', 514),
(20878, 'Xã Tiên Cảnh', 'Xã', 514),
(20881, 'Xã Tiên Mỹ', 'Xã', 514),
(20884, 'Xã Tiên Phong', 'Xã', 514),
(20887, 'Xã Tiên Thọ', 'Xã', 514),
(20890, 'Xã Tiên An', 'Xã', 514),
(20893, 'Xã Tiên Lộc', 'Xã', 514),
(20896, 'Xã Tiên Lập', 'Xã', 514),
(20899, 'Thị trấn Trà My', 'Thị trấn', 515),
(20900, 'Xã Trà Sơn', 'Xã', 515),
(20902, 'Xã Trà Kót', 'Xã', 515),
(20905, 'Xã Trà Nú', 'Xã', 515),
(20908, 'Xã Trà Đông', 'Xã', 515),
(20911, 'Xã Trà Dương', 'Xã', 515),
(20914, 'Xã Trà Giang', 'Xã', 515),
(20917, 'Xã Trà Bui', 'Xã', 515),
(20920, 'Xã Trà Đốc', 'Xã', 515),
(20923, 'Xã Trà Tân', 'Xã', 515),
(20926, 'Xã Trà Giác', 'Xã', 515),
(20929, 'Xã Trà Giáp', 'Xã', 515),
(20932, 'Xã Trà Ka', 'Xã', 515),
(20935, 'Xã Trà Leng', 'Xã', 516),
(20938, 'Xã Trà Dơn', 'Xã', 516),
(20941, 'Xã Trà Tập', 'Xã', 516),
(20944, 'Xã Trà Mai', 'Xã', 516),
(20947, 'Xã Trà Cang', 'Xã', 516),
(20950, 'Xã Trà Linh', 'Xã', 516),
(20953, 'Xã Trà Nam', 'Xã', 516),
(20956, 'Xã Trà Don', 'Xã', 516),
(20959, 'Xã Trà Vân', 'Xã', 516),
(20962, 'Xã Trà Vinh', 'Xã', 516),
(20965, 'Thị trấn Núi Thành', 'Thị trấn', 517),
(20968, 'Xã Tam Xuân I', 'Xã', 517),
(20971, 'Xã Tam Xuân II', 'Xã', 517),
(20974, 'Xã Tam Tiến', 'Xã', 517),
(20977, 'Xã Tam Sơn', 'Xã', 517),
(20980, 'Xã Tam Thạnh', 'Xã', 517),
(20983, 'Xã Tam Anh Bắc', 'Xã', 517),
(20984, 'Xã Tam Anh Nam', 'Xã', 517),
(20986, 'Xã Tam Hòa', 'Xã', 517),
(20989, 'Xã Tam Hiệp', 'Xã', 517),
(20992, 'Xã Tam Hải', 'Xã', 517),
(20995, 'Xã Tam Giang', 'Xã', 517),
(20998, 'Xã Tam Quang', 'Xã', 517),
(21001, 'Xã Tam Nghĩa', 'Xã', 517),
(21004, 'Xã Tam Mỹ Tây', 'Xã', 517),
(21005, 'Xã Tam Mỹ Đông', 'Xã', 517),
(21007, 'Xã Tam Trà', 'Xã', 517),
(21010, 'Phường Lê Hồng Phong', 'Phường', 522),
(21013, 'Phường Trần Phú', 'Phường', 522),
(21016, 'Phường Quảng Phú', 'Phường', 522),
(21019, 'Phường Nghĩa Chánh', 'Phường', 522),
(21022, 'Phường Trần Hưng Đạo', 'Phường', 522),
(21025, 'Phường Nguyễn Nghiêm', 'Phường', 522),
(21028, 'Phường Nghĩa Lộ', 'Phường', 522),
(21031, 'Phường Chánh Lộ', 'Phường', 522),
(21034, 'Xã Nghĩa Dũng', 'Xã', 522),
(21037, 'Xã Nghĩa Dõng', 'Xã', 522),
(21040, 'Thị Trấn Châu Ổ', 'Thị trấn', 524),
(21043, 'Xã Bình Thuận', 'Xã', 524),
(21046, 'Xã Bình Thạnh', 'Xã', 524),
(21049, 'Xã Bình Đông', 'Xã', 524),
(21052, 'Xã Bình Chánh', 'Xã', 524),
(21055, 'Xã Bình Nguyên', 'Xã', 524),
(21058, 'Xã Bình Khương', 'Xã', 524),
(21061, 'Xã Bình Trị', 'Xã', 524),
(21064, 'Xã Bình An', 'Xã', 524),
(21067, 'Xã Bình Hải', 'Xã', 524),
(21070, 'Xã Bình Dương', 'Xã', 524),
(21073, 'Xã Bình Phước', 'Xã', 524),
(21076, 'Xã Bình Thới', 'Xã', 524),
(21079, 'Xã Bình Hòa', 'Xã', 524),
(21082, 'Xã Bình Trung', 'Xã', 524),
(21085, 'Xã Bình Minh', 'Xã', 524),
(21088, 'Xã Bình Long', 'Xã', 524),
(21091, 'Xã Bình Thanh Tây', 'Xã', 524),
(21094, 'Xã Bình Phú', 'Xã', 524),
(21097, 'Xã Bình Thanh Đông', 'Xã', 524),
(21100, 'Xã Bình Chương', 'Xã', 524),
(21103, 'Xã Bình Hiệp', 'Xã', 524),
(21106, 'Xã Bình Mỹ', 'Xã', 524),
(21109, 'Xã Bình Tân', 'Xã', 524),
(21112, 'Xã Bình Châu', 'Xã', 524),
(21115, 'Thị trấn Trà Xuân', 'Thị trấn', 525),
(21118, 'Xã Trà Giang', 'Xã', 525),
(21121, 'Xã Trà Thủy', 'Xã', 525),
(21124, 'Xã Trà Hiệp', 'Xã', 525),
(21127, 'Xã Trà Bình', 'Xã', 525),
(21130, 'Xã Trà Phú', 'Xã', 525),
(21133, 'Xã Trà Lâm', 'Xã', 525),
(21136, 'Xã Trà Tân', 'Xã', 525),
(21139, 'Xã Trà Sơn', 'Xã', 525),
(21142, 'Xã Trà Bùi', 'Xã', 525),
(21145, 'Xã Trà Thanh', 'Xã', 526),
(21148, 'Xã Trà Khê', 'Xã', 526),
(21151, 'Xã Trà Quân', 'Xã', 526),
(21154, 'Xã Trà Phong', 'Xã', 526),
(21157, 'Xã Trà Lãnh', 'Xã', 526),
(21160, 'Xã Trà Nham', 'Xã', 526),
(21163, 'Xã Trà Xinh', 'Xã', 526),
(21166, 'Xã Trà Thọ', 'Xã', 526),
(21169, 'Xã Trà Trung', 'Xã', 526),
(21172, 'Phường Trương Quang Trọng', 'Phường', 522),
(21175, 'Xã Tịnh Thọ', 'Xã', 527),
(21178, 'Xã Tịnh Trà', 'Xã', 527),
(21181, 'Xã Tịnh Phong', 'Xã', 527),
(21184, 'Xã Tịnh Hiệp', 'Xã', 527),
(21187, 'Xã Tịnh Hòa', 'Xã', 522),
(21190, 'Xã Tịnh Kỳ', 'Xã', 522),
(21193, 'Xã Tịnh Bình', 'Xã', 527),
(21196, 'Xã Tịnh Đông', 'Xã', 527),
(21199, 'Xã Tịnh Thiện', 'Xã', 522),
(21202, 'Xã Tịnh Ấn Đông', 'Xã', 522),
(21205, 'Xã Tịnh Bắc', 'Xã', 527),
(21208, 'Xã Tịnh Châu', 'Xã', 522),
(21211, 'Xã Tịnh Khê', 'Xã', 522),
(21214, 'Xã Tịnh Long', 'Xã', 522),
(21217, 'Xã Tịnh Sơn', 'Xã', 527),
(21220, 'Xã Tịnh Hà', 'Xã', 527),
(21223, 'Xã Tịnh Ấn Tây', 'Xã', 522),
(21226, 'Xã Tịnh Giang', 'Xã', 527),
(21229, 'Xã Tịnh Minh', 'Xã', 527),
(21232, 'Xã Tịnh An', 'Xã', 522),
(21235, 'Thị trấn La Hà', 'Thị trấn', 528),
(21238, 'Thị trấn Sông Vệ', 'Thị trấn', 528),
(21241, 'Xã Nghĩa Lâm', 'Xã', 528),
(21244, 'Xã Nghĩa Thắng', 'Xã', 528),
(21247, 'Xã Nghĩa Thuận', 'Xã', 528),
(21250, 'Xã Nghĩa Kỳ', 'Xã', 528),
(21253, 'Xã Nghĩa Phú', 'Xã', 522),
(21256, 'Xã Nghĩa Hà', 'Xã', 522),
(21259, 'Xã Nghĩa Sơn', 'Xã', 528),
(21262, 'Xã Nghĩa An', 'Xã', 522),
(21265, 'Xã Nghĩa Thọ', 'Xã', 528),
(21268, 'Xã Nghĩa Hòa', 'Xã', 528),
(21271, 'Xã Nghĩa Điền', 'Xã', 528),
(21274, 'Xã Nghĩa Thương', 'Xã', 528),
(21277, 'Xã Nghĩa Trung', 'Xã', 528),
(21280, 'Xã Nghĩa Hiệp', 'Xã', 528),
(21283, 'Xã Nghĩa Phương', 'Xã', 528),
(21286, 'Xã Nghĩa Mỹ', 'Xã', 528),
(21289, 'Thị trấn Di Lăng', 'Thị trấn', 529),
(21292, 'Xã Sơn Hạ', 'Xã', 529),
(21295, 'Xã Sơn Thành', 'Xã', 529),
(21298, 'Xã Sơn Nham', 'Xã', 529),
(21301, 'Xã Sơn Bao', 'Xã', 529),
(21304, 'Xã Sơn Linh', 'Xã', 529),
(21307, 'Xã Sơn Giang', 'Xã', 529),
(21310, 'Xã Sơn Trung', 'Xã', 529),
(21313, 'Xã Sơn Thượng', 'Xã', 529),
(21316, 'Xã Sơn Cao', 'Xã', 529),
(21319, 'Xã Sơn Hải', 'Xã', 529),
(21322, 'Xã Sơn Thủy', 'Xã', 529),
(21325, 'Xã Sơn Kỳ', 'Xã', 529),
(21328, 'Xã Sơn Ba', 'Xã', 529),
(21331, 'Xã Sơn Bua', 'Xã', 530),
(21334, 'Xã Sơn Mùa', 'Xã', 530),
(21335, 'Xã Sơn Liên', 'Xã', 530),
(21337, 'Xã Sơn Tân', 'Xã', 530),
(21338, 'Xã Sơn Màu', 'Xã', 530),
(21340, 'Xã Sơn Dung', 'Xã', 530),
(21341, 'Xã Sơn Long', 'Xã', 530),
(21343, 'Xã Sơn Tinh', 'Xã', 530),
(21346, 'Xã Sơn Lập', 'Xã', 530),
(21349, 'Xã Long Sơn', 'Xã', 531),
(21352, 'Xã Long Mai', 'Xã', 531),
(21355, 'Xã Thanh An', 'Xã', 531),
(21358, 'Xã Long Môn', 'Xã', 531),
(21361, 'Xã Long Hiệp', 'Xã', 531),
(21364, 'Thị trấn Chợ Chùa', 'Thị trấn', 532),
(21367, 'Xã Hành Thuận', 'Xã', 532),
(21370, 'Xã Hành Dũng', 'Xã', 532),
(21373, 'Xã Hành Trung', 'Xã', 532),
(21376, 'Xã Hành Nhân', 'Xã', 532),
(21379, 'Xã Hành Đức', 'Xã', 532),
(21382, 'Xã Hành Minh', 'Xã', 532),
(21385, 'Xã Hành Phước', 'Xã', 532),
(21388, 'Xã Hành Thiện', 'Xã', 532),
(21391, 'Xã Hành Thịnh', 'Xã', 532),
(21394, 'Xã Hành Tín Tây', 'Xã', 532),
(21397, 'Xã Hành Tín  Đông', 'Xã', 532),
(21400, 'Thị trấn Mộ Đức', 'Thị trấn', 533),
(21403, 'Xã Đức Lợi', 'Xã', 533),
(21406, 'Xã Đức Thắng', 'Xã', 533),
(21409, 'Xã Đức Nhuận', 'Xã', 533),
(21412, 'Xã Đức Chánh', 'Xã', 533),
(21415, 'Xã Đức Hiệp', 'Xã', 533),
(21418, 'Xã Đức Minh', 'Xã', 533),
(21421, 'Xã Đức Thạnh', 'Xã', 533),
(21424, 'Xã Đức Hòa', 'Xã', 533),
(21427, 'Xã Đức Tân', 'Xã', 533),
(21430, 'Xã Đức Phú', 'Xã', 533),
(21433, 'Xã Đức Phong', 'Xã', 533),
(21436, 'Xã Đức Lân', 'Xã', 533),
(21439, 'Thị trấn Đức Phổ', 'Thị trấn', 534),
(21442, 'Xã Phổ An', 'Xã', 534),
(21445, 'Xã Phổ Phong', 'Xã', 534),
(21448, 'Xã Phổ Thuận', 'Xã', 534),
(21451, 'Xã Phổ Văn', 'Xã', 534),
(21454, 'Xã Phổ Quang', 'Xã', 534),
(21457, 'Xã Phổ Nhơn', 'Xã', 534),
(21460, 'Xã Phổ Ninh', 'Xã', 534),
(21463, 'Xã Phổ Minh', 'Xã', 534),
(21466, 'Xã Phổ Vinh', 'Xã', 534),
(21469, 'Xã Phổ Hòa', 'Xã', 534),
(21472, 'Xã Phổ Cường', 'Xã', 534),
(21475, 'Xã Phổ Khánh', 'Xã', 534),
(21478, 'Xã Phổ Thạnh', 'Xã', 534),
(21481, 'Xã Phổ Châu', 'Xã', 534),
(21484, 'Thị trấn Ba Tơ', 'Thị trấn', 535),
(21487, 'Xã Ba Điền', 'Xã', 535),
(21490, 'Xã Ba Vinh', 'Xã', 535),
(21493, 'Xã Ba Thành', 'Xã', 535),
(21496, 'Xã Ba Động', 'Xã', 535),
(21499, 'Xã Ba Dinh', 'Xã', 535),
(21500, 'Xã Ba Giang', 'Xã', 535),
(21502, 'Xã Ba Liên', 'Xã', 535),
(21505, 'Xã Ba Ngạc', 'Xã', 535),
(21508, 'Xã Ba Khâm', 'Xã', 535),
(21511, 'Xã Ba Cung', 'Xã', 535),
(21514, 'Xã Ba Chùa', 'Xã', 535),
(21517, 'Xã Ba Tiêu', 'Xã', 535),
(21520, 'Xã Ba Trang', 'Xã', 535),
(21523, 'Xã Ba Tô', 'Xã', 535),
(21526, 'Xã Ba Bích', 'Xã', 535),
(21529, 'Xã Ba Vì', 'Xã', 535),
(21532, 'Xã Ba Lế', 'Xã', 535),
(21535, 'Xã Ba Nam', 'Xã', 535),
(21538, 'Xã Ba Xa', 'Xã', 535),
(21541, 'Xã An Vĩnh', 'Xã', 536),
(21544, 'Xã An Hải', 'Xã', 536),
(21547, 'Xã An Bình', 'Xã', 536);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
