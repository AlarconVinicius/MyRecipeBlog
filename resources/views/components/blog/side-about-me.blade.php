<div class="sidebar__about__item">
    <div class="sidebar__item__title">
        <h6>Sobre Nós</h6>
    </div>
    <img src="{{ asset($setting->sobre_image ? $setting->sobre_image : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="">
    <p>{!! $setting->sobre_resumo !!}</p>
    <a href="{{ route('about') }}" class="primary-btn">Ler mais</a>
</div>