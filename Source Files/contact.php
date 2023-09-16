<?php include_once('./widgets/header.php'); ?>
<div class="contact">
    <div class="container-decor container mt-5">
        <div class="box-map mb-3" style="justify-content: center;" >
            <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669726937899!2d106.68006961471826!3d10.759917092332728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1665803105945!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <h3 class="text-center">Liên Hệ Với Chúng Tôi</h3><br />

        <div class="row">
        <div class="col-md-8">
            <form action="/post" method="post">
                <input class="form-control" name="name" placeholder="Tên..." /><br />
                <input class="form-control" name="phone" placeholder="Số Điện Thoại..." /><br />
                <input class="form-control" name="email" placeholder="E-mail..." /><br />
                <textarea class="form-control" name="text" placeholder="Gửi Lời Nhắn Của Bạn Ở Đây..." style="height:150px;"></textarea><br />
                <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
            </form>
        </div>
        <div class="col-md-4">
            <b>Thông Tin:</b> <br />
            Phone: 0123456789<br />
            E-mail: <a href="mailto:toanld392003@gmail.com">toanld392003@gmail.com</a><br />
            Address: 273 An Dương Vương, Phường 3, Quận 5, Hồ Chí Minh
        </div>
        </div>
    </div>
</div>
<?php include_once('./widgets/footer.php'); ?>