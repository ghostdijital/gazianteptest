# Çok Sektörlü Web Sitesi ve Yönetim Paneli Proje Planı

Bu depo, çok sektörlü (taksi, eğitim, lojistik, sağlık vb.) web sitesi ile modern bir yönetim panelinin Laravel tabanlı olarak geliştirilmesi için hazırlanmış kapsamlı gereksinimleri içerir. Aşağıda, projeyi hayata geçirmek üzere takip edilecek mimari ve görev planı özetlenmiştir.

## Hedefler
- Laravel 11 ve MySQL kullanarak çok dilli (varsayılan Türkçe) bir kurumsal web sitesi geliştirmek.
- Bootstrap 5 tabanlı modern, duyarlı bir arayüz ve animasyonlu geçişler sağlamak.
- Yönetim paneli üzerinden tüm içerik ve ayarların (site bilgisi, sosyal bağlantılar, iletişim, SMTP vb.) yönetilebilir olmasını sağlamak.
- Slider, hizmetler, galeri, ekip, blog, S.S.S., iletişim gibi modüllerin etkinleştirme/kapama (feature flag) desteği ile kontrol edilmesi.

## Mimari Yaklaşım
1. **Laravel Kurulumu**: `laravel/laravel` iskeleti ile proje başlatılacak, `.env` yapılandırılacak ve `storage:link` oluşturulacak.
2. **Veritabanı Şeması**: Yönetici kullanıcıları, ayarlar, özellik bayrakları, slider, galeri, ekip, S.S.S. ve blog gönderileri için migration dosyaları tanımlanacak. Seeder'lar Türkçe örnek içeriklerle doldurulacak.
3. **Çok Dillilik**: `resources/lang/tr` ve `resources/lang/en` dizinlerinde dil dosyaları hazırlanacak. Dil değiştirici middleware ve rota parametreleri ile sağlanacak.
4. **Ön Yüz**: Blade layout yapısı kurulacak (`layouts/app.blade.php`), bileşenler (`partials/header.blade.php`, `partials/footer.blade.php`) ve sayfalar (`home`, `services`, `gallery`, `team`, `blog`, `faq`, `contact`) oluşturulacak. Tüm metinler varsayılan olarak Türkçe olacak ve veritabanından dinamik olarak beslenecek.
5. **Yönetim Paneli**: `/admin` altında ayrı layout (`layouts/admin.blade.php`) ile modüler menü yapısı, kimlik doğrulama (Laravel Fortify veya custom guard), içerik yönetimi CRUD ekranları, dosya yüklemeleri ve WYSIWYG editör (CKEditor) entegrasyonu sağlanacak.
6. **İletişim Formu ve SMTP**: Ayarlardan okunan SMTP bilgileri ile iletişim formu e-postası gönderilecek; doğrulama ve Türkçe geri bildirim mesajları uygulanacak.
7. **Özellik Bayrakları**: `feature_flags` tablosundaki değerler aracılığıyla ön yüzde ilgili bölümlerin gösterimi koşullu hale getirilecek.
8. **Güvenlik ve Performans**: CSRF koruması, parola hashing, dosya türü doğrulaması uygulanacak; ayarlar için caching (ör. `cache()->rememberForever`) yapılandırılacak.

## Görev Listesi
- [ ] Laravel projesini oluştur ve temel konfigürasyonu yap.
- [ ] Migration, model ve seeder dosyalarını yaz.
- [ ] Çok dillilik altyapısını ve dil dosyalarını hazırla.
- [ ] Ön yüz Blade şablonlarını ve bileşenlerini tasarla.
- [ ] Yönetim paneli rotaları, controller'ları ve view'larını geliştir.
- [ ] WYSIWYG editör ve medya yükleme özelliklerini entegre et.
- [ ] İletişim formu e-posta gönderimini ve doğrulamasını uygula.
- [ ] Feature flag kontrollerini hem yönetim panelinde hem ön yüzde tamamla.
- [ ] Birim/özellik testleri ekle ve manuel senaryolarla doğrula.

Bu plan tamamlandığında, proje tek kod tabanından birden fazla sektöre hitap edebilecek esnek ve özelleştirilebilir bir çözüm sunacaktır.
