<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $blog = Blog::firstOrNew(['id' => 1]);
        if (!$blog->exists) {
            $blog->fill([
                    'title' => 'Cà phê và bố',
                    'slug' => 'slug 1',
                    'img' => '1.jpg',
                    'content' => 'Phải nói ngay rằng, tôi không ‘ghiền’ cà phê, theo nghĩa, buổi sáng chưa có ‘giọt’ nào thì người bải hoải, đầu óc trống rỗng, làm gì cũng không ra hồn, hay thậm chí chân tay run rẩy, ngồi đâu ngáp đó…. Tôi chỉ thích cà phê, mà cụ thể là thích ngửi cái mùi thơm thơm của nó, vốn không giống bất kỳ mùi gì trên thế gian này.

Cái thú của tôi vào buổi sáng, nhất là những ngày se se lạnh đầu thu của California, là khi thức dậy, bỏ cà phê vào phin rồi chế nước sôi. Trong lúc cà phê nhiểu từng giọt, thì cũng là lúc cái mùi thơm thơm ấy tỏa ra khắp nhà, đánh thức tất cả các giác quan, cho đến lúc nhấp một ngụm nhỏ để tận hưởng ngay trên đầu lưỡi, với tôi như thế là quá đủ.



Tôi không nhớ chính xác ngày tháng, hay năm, nhưng kể từ khi biết đến cái mùi thơm thơm của ly cà phê đầu ngày ấy đến nay đã gần 40 năm và người mang đến chính là bố tôi.

Vốn là đứa trẻ ưa tò mò, cả một buổi sáng tôi cứ cố tình loay hoay bên bố để xem ông pha cà phê bằng cái vật hao hao giống ‘cái nồi’ như thế nào. Bố tôi, chắc cũng là lần đầu tiên trong đời mới biết pha cà phê, theo cách người bạn của ông hướng dẫn. Loay hoay một hồi rồi cũng thành công, và dĩ nhiên, tôi là người được bố cho nếm thử. Không biết cảm nhận của bố ra sao, nhưng với tôi cái thứ nước đen đen đó sao mà đắng quá chừng, dù đã được ông ưu ái cho thêm một muỗng đường.

Dù không thích vị đắng, nhưng vì cái mùi thơm thơm dễ chịu tỏa ra từ cái phin cà phê của bố mỗi buổi sáng trước khi ông leo lên xe đạp đi làm, nên tôi luôn nhận lời rửa ly tách cho ông. Sau bịch cà phê xay sẵn được tặng ấy, dù nhà không khá giả gì, nhưng vì thích cà phê, bố tôi chọn cách mua cà phê hột về rang rồi tự xay thay cho cà phê xay sẵn. Cũng nhờ đó mà tôi thêm biết mùi bơ nó thơm như thế nào. Đó là khi rang cà phê gần vàng, bố cho một ít bơ vào khuấy đều lên, mà theo lời ông, là để cho mùi cà phê thêm đậm đà.

Sau này, khi cuộc sống có phần khá hơn, bố vẫn không ra quán mà giữ thói quen uống cà phê sáng ở nhà, và cái phin nhôm này nào đã được thay bằng đồ inox sáng choang. Uống cà phê nhiều năm, nhưng bố tôi chỉ ‘chung thủy’ với cà phê đen nóng, không sữa, cũng không đá, vì theo ông, những thứ đó sẽ làm giảm mùi vị nguyên chất của cà phê.



Không biết người khác pha cà phê phin ra sao, nhưng bố tôi bao giờ cũng tuân thủ nguyên tắc bất di bất dịch, lượng cà phê và nước chiếm thể tích bằng nhau và cứ 5 giây đồng hồ là một giọt cà phê nhiểu xuống. Ông bảo, nhiểu nhanh quá, cà phê chưa thấm hết, cũng không ngon mà chậm quá thì cà phê nguội ngắt uống chán phèo.

Mười sáu tuổi, tôi chính thức rời xa gia đình. Đi học xa nhà, ở trọ, trung học, đại học, ra trường, đi làm, lập gia đình và bây giờ ở xa nửa vòng trái đất, nên gần 30 năm nay tôi không được thường xuyên “cà phê” với bố. Tuy nhiên những khi có dịp về thăm nhà, thì mỗi buổi sáng bao giờ tôi cũng được bố ưu ái cho ngồi cạnh và pha cho ly cà phê đầu ngày, dù gần đây, vì lý do sức khỏe, bố phải bỏ hẳn cà phê.

Buổi sáng ở quê nhà, ngồi bên bố và cái phin cà phê đang tỏa ra cái mùi thơm thơm đặc trưng ấy, luôn là ước mơ giản dị nhất của tôi, ước mơ không phải dễ dàng gì có được.

Nhìn thằng bé con tôi đưa mắt say sưa ngó vào chiếc phin cà phê đang nhỏ từng giọt Coffee xuống ly, tôi như bắt gặp mình của những ngày xa xưa đó. Và tự hỏi, đến bao giờ con tôi có ước mơ như tôi, bây giờ.',
                    'intro' => 'Phải nói ngay rằng, tôi không ‘ghiền’ cà phê, theo nghĩa, buổi sáng chưa có ‘giọt’ nào thì người bải hoải, đầu óc trống rỗng, làm gì cũng không ra hồn, hay thậm chí chân tay run rẩy, ngồi đâu ngáp đó…. Tôi chỉ thích cà phê, mà cụ thể là thích ngửi cái mùi thơm thơm của nó, vốn không giống bất kỳ mùi gì trên thế gian này.',
                    'status' => '1',
                    'view_count' => 1,
                    'created_at' => '2017-06-21 06:11:46',
                    'updated_at' => '2017-06-22 06:11:46',
                ])->save();
        }
        $blog = Blog::firstOrNew(['id' => 2]);
        if (!$blog->exists) {
            $blog->fill([
                    'title' => 'Cà phê trứng - nét văn hóa xưa của người Hà Nội',
                    'slug' => 'slug 2',
                    'img' => '2.jpg',
                    'intro' => 'Cả quả trứng như thế mà cho vào cốc cà phê sao, tanh chết”, một vị khách người Ả Rập nhăn mũi. Chủ quán cà phê trứng cười, “nếu tanh tôi tặng ông ly này, còn ngược lại, ông trả tôi 10 lần tiền”. Đó là một trong số vô vàn những người khách từng thắc mắc với ông Nguyễn Chí Hòa, chủ quán cà phê Giảng ở 39 Nguyễn Hữu Huân, quận Hoàn Kiếm, Hà Nội.',
                    'content' => 'Cả quả trứng như thế mà cho vào cốc cà phê sao, tanh chết”, một vị khách người Ả Rập nhăn mũi. Chủ quán cà phê trứng cười, “nếu tanh tôi tặng ông ly này, còn ngược lại, ông trả tôi 10 lần tiền”. Đó là một trong số vô vàn những người khách từng thắc mắc với ông Nguyễn Chí Hòa, chủ quán cà phê Giảng ở 39 Nguyễn Hữu Huân, quận Hoàn Kiếm, Hà Nội.

Vị khách người Ả Rập đến quán của ông nhiều năm trước, họ dẫn theo một đứa con nhỏ và bắt đầu cuộc “cá độ” về độ tanh của thức uống từng có mặt ở đất Hà Nội từ năm 1946. “Bố phải trả tiền rồi”, sau ngụm đầu tiên, đứa con nhỏ nói với ông bố người ngoại quốc. Ông bố ngờ vực, nhưng vẫn đưa chiếc ly ấm sực kề lên môi. Và sau đó tích tắc, ông uống cạn ly rồi gật gù: “Tôi sẽ trả ông gấp 10 lần tiền nhé”. Vị khách và cả ông Nguyễn Chí Hòa đều cười rất tươi.

Dĩ nhiên, ông Hòa chỉ lấy đúng giá trị của một ly cà phê trứng. Giá trị của ẩm thực, không nằm ở số tiền anh phải chi ra bao nhiêu, mà là sự thỏa mãn của người sử dụng. Bao nhiêu năm rồi, triết lý ấy với chủ quán cà phê trứng 39 Nguyễn Hữu Huân chưa bao giờ phai nhạt.



Cà Phê Giảng - 39 Nguyễn Hữu Huân

Phóng viên CNN cũng đã từng tìm đến quán nhỏ trên phố Nguyễn Hữu Huân để nghe về câu chuyện sáng tạo tách cà phê trứng - đồ uống mà du khách truyền tai nhau khi đến với Hà Nội. Ở Việt Nam có nhiều phong cách cà phê khác nhau từ vỉa hè tới sang trọng, tuy nhiên thực khách đến với Giảng, một quán cà phê khiêm tốn ở Hà Nội, luôn mong muốn được uống một loại đồ uống đặc biệt hơn cả. Đó chính là cà phê trứng, đặc sản của Hà Nội làm từ trứng đánh bông lên hòa quyện cùng cà phê Việt. Dù rất nhiều nơi ở thủ đô cũng phục vụ loại đồ uống này, Giảng mới thực sự là nơi sáng tạo ra nó, theo CNN.  

Cà phê trứng có màu hơi vàng đựng trong một tách nhỏ. Thực khách luôn có thêm một chiếc thìa con để thưởng thức bọt kem bên trên giống như "món khai vị" trước khi uống cà phê bên dưới. Để giữ cho đồ uống luôn nóng, người phục vụ sẽ đặt ly cà phê của bạn vào một bát nước ấm. Sau khi được rót qua lớp bọt kem đánh bông lên từ trứng, vị cà phê đặc đọng lại ở đáy cốc có phần đậm đà hơn.  



Ông chia sẻ: "Tôi rất vui và vinh hạnh khi có nhiều du khách biết đến thương hiệu của chúng tôi rồi tới đây uống cà phê. Chính sự khác biệt trong công thức pha chế đã đưa cà phê trứng trở thành đồ uống mà ai đến Hà Nội cũng phải thử. Nhiều nơi có bắt chước chúng tôi nhưng hương vị không thể giống được".

Nét xưa giữa phố thị xô bồ

“Nhiều quán cà phê đã chuyển sang ghế salon thời thượng, chúng tôi vẫn giữ nguyên những chiếc ghế gỗ mộc mạc, đơn giản, để khách đến đây có thể nhớ về những gì của Hà Nội thời xa vắng”, ông Hòa bảo.

Ông Hòa ngày ngày vẫn đảm nhiệm việc rang, xay cà phê, một trong những công đoạn cực kỳ quan trọng cần bí quyết gia truyền để ly cà phê trứng ngon, khác biệt. Vợ ông Hòa vẫn là người pha chế cà phê trứng ngon nhất nhà.

Ông Hòa có hai người con gái đều làm các công việc khác nhau, không liên quan đến cà phê. Hiện tại, các con chỉ phụ giúp bố mẹ phần nào. Còn lại, việc tìm ra ai là người kế nghiệp của cà phê Giảng nơi con phố này cũng là một câu hỏi khó. Người đàn ông với nụ cười hiền hậu trầm ngâm: “Làm cà phê cần vận dụng tay chân nhiều hơn, phải thức khuya dậy sớm, tỉ mẩn và cẩn trọng. Dù sao, tôi mong các con rể và con gái của tôi sẽ có lúc suy nghĩ lại”.',
                    'status' => '1',
                    'view_count' => 2,
                    'created_at' => '2017-06-21 06:11:46',
                    'updated_at' => '2017-06-22 06:11:46',
                ])->save();
        }
        
        $blog = Blog::firstOrNew(['id' => 3]);
        if (!$blog->exists) {
            $blog->fill([
                    'title' => 'Cà phê sữa & cà phê đen',
                    'slug' => 'slug 3',
                    'img' => '3.jpg',
                    'intro' => 'Vào quán uống nước, em luôn gọi cà phê đen. Anh luôn gọi cà phê sữa. Người ta mang nước ra, luôn luôn nhầm lẫn. Anh cà phê đen. Em cà phê sữa. Em nhanh tay đổi 2 món. Người phục vụ đứng ngẩn ra, mặt đầy vẻ thắc mắc. Anh cười trừ. Đợi người ta đi, anh trách “Sao không để người ta đi rồi em hãy đổi? Làm mất mặt anh quá!!!” Em cười phá lên “Đằng nào cũng vậy. Đâu có gì mắc cỡ!”.',
                    'content' => 'Vào quán uống nước, em luôn gọi cà phê đen. Anh luôn gọi cà phê sữa. Người ta mang nước ra, luôn luôn nhầm lẫn. Anh cà phê đen. Em cà phê sữa. Em nhanh tay đổi 2 món. Người phục vụ đứng ngẩn ra, mặt đầy vẻ thắc mắc. Anh cười trừ. Đợi người ta đi, anh trách “Sao không để người ta đi rồi em hãy đổi? Làm mất mặt anh quá!!!” Em cười phá lên “Đằng nào cũng vậy. Đâu có gì mắc cỡ!”.

Em con gái mà lại thích cà phê đen. Anh con trai nhưng rất thích cà phê sữa. Em bảo cà phê đen nguyên chất, tuy đắng nhưng uống rồi sẽ mang lại dư vị, mà nếu pha thêm sữa thì sẽ chẳng còn cảm giác cà phê nữa. Anh bảo cà phê cho thêm tí sữa sẽ đậm mùi cà phê hơn, lại còn cảm giác ngọt ngào của sữa…Anh và em luôn thế. Khác nhau hoàn toàn.

Related image

Anh và em không yêu nhau. Đơn giản chỉ là bạn bè. Mà không, trên bạn bè 1 chút. Gần giống như tình anh em. Nhưng em không chịu làm em gái anh. Em bảo, em gái có vẻ phụ thuộc vào anh trai, có vẻ yếu đuối, có vẻ… hàng trăm cái “có vẻ” và em không đồng tình. Anh cũng không muốn anh là anh trai của em. Anh trai suốt ngày phải lo cho em gái, bị nhõng nhẽo, vòi vĩnh đủ thứ. Anh không thể kiên nhẫn.

Thỉnh thoảng buồn buồn anh lôi em đi vòng vòng, rốt cuộc cũng đến quán nước. Anh cà phê sữa. Em cà phê đen. Anh có bạn gái. Bạn gái anh xinh xắn, rất dịu dàng, nữ tính. Đi với anh giống như 1 con thỏ non yếu ớt. Anh tự hào bảo, cô ấy không “ba gai”, bướng bỉnh như em. Em có bạn trai. Bạn trai em đẹp trai, galan, luôn chiều chuộng em. Đi với em, anh ấy không bao giờ khiến em tức chết. Em kiêu hãnh khoe, anh ấy thực sự là chỗ dựa vững chắc.



2 cặp thỉnh thoảng gặp nhau. Em vẫn cà phê đen. Anh luôn cà phê sữa. Bạn trai em nói, anh đổi ly cho em. Em không chịu, cà phê đen là sở thích của em. Bạn gái anh thắc mắc, anh không uống cà phê đen như những người con trai khác. Anh nhún vai, cà phê sữa hợp khẩu vị với anh. Trong lúc nói chuyện, thường thường anh và em vẫn cãi nhau. Bạn trai em luôn là người hòa giải. Bạn gái anh dịu dàng nói anh phải biết nhường nhịn con gái. Cuối cùng anh là anh. Em vẫn là em.

Anh chia tay bạn gái. Cũng có thời gian chông chênh. Nhưng anh không hối tiếc. Anh và cô căn bản không hợp nhau. Dù cô ra sức chiều chuộng anh, nhưng anh vẫn thấy thiếu thiếu cá tính gì đó. Mà cá tính thiếu ấy mới thật sự hấp dẫn anh. Em chia tay bạn trai. Có một lúc cảm thấy trống vắng. Nhưng em không hối hận. Em và bạn trai không tìm được tiếng nói chung. Dù anh ấy không khiến em bực mình, ít khi gây sự với em. Nhưng em vẫn thấy thiếu thiếu. Mà “thiếu thiếu” ấy làm em chán nản. Anh và em không hẹn mà gặp nhau ở quán cà phê cũ. Em gọi cà phê đen. Anh gọi cà phê sữa. Người phục vụ đã quen với 2 người. Anh ta không để nhầm chỗ nữa. Anh yên lặng. Em cũng không nói. Đợi người bồi đi, anh kéo ly cà phê đen về phía mình, đẩy ly cà phê sữa về phía em.



Hôm đó 2 người uống thử “khẩu vị” của người kia. Đêm ấy, anh nhắn tin cho em “Cà phê đen hay thật! Anh bắt đầu thấy thích nó!”. Em nhắn tin lại cho anh “Cà phê thêm sữa cũng rất tuyệt vời. Em sẽ uống cà phê sữa…”. Sau đó em và anh luôn đi cùng nhau, bất luận ở đâu, em cũng luôn gọi cà phê sữa cho em và không quên gọi cà phê đen cho anh… Cà phê đen hay cà phê sữa đều là cà phê, phải không? Tình yêu đắng hay tình yêu ngọt đều là tình yêu… chẳng phải sao???',
                    'status' => '1',
                    'view_count' => 3,
                    'created_at' => '2017-06-21 06:11:46',
                    'updated_at' => '2017-06-22 06:11:46',
                ])->save();
        }
    }
}
