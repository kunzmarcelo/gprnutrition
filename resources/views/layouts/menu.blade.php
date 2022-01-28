<!-- need to remove -->
{{-- <li class="nav-item">
    <a href="../widgets.html" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Widgets</p>
    </a>
</li>

<li class="nav-item">
    <a href="gallery.html" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>Gallery</p>
    </a>
</li> --}}



<li class="nav-item has-treeview ">
    <a class="nav-link  " href="">
        <i class="fas fa-address-card "></i>
        <p>
            Cadastros
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>


    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/animais')}}">
                <i class="fas fa-horse-head "></i>
                <p>
                    Animais
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/lote')}}">
                <i class="fas fa-object-ungroup "></i>
                <p>
                    Lotes
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/medicamento')}}">
                <i class="fas fa-clinic-medical "></i>
                <p>
                    Medicamentos
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/estoque')}}">
                <i class="fas fa-layer-group "></i>
                <p>
                    Estoque
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/semem')}}">
                <i class="fas fa-code-branch "></i>
                <p>
                    Sêmen
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header ">
    REPRODUÇÃO
</li>

<li class="nav-item has-treeview ">
    <a class="nav-link  " href="">
        <i class="fab fa-algolia "></i>
        <p>
            Reprodução
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>


    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/cobertura')}}">
                <i class="fas fa-vector-square "></i>
                <p>
                    Cobertura
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/reproducao')}}">
                <i class="fas fa-stethoscope "></i>
                <p>
                    Ultrassom
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header ">
    PRODUÇÃO
</li>

<li class="nav-item has-treeview ">
    <a class="nav-link  " href="">
        <i class="fas fa-folder-plus "></i>
        <p>
            Ordenha/Produção
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/producao/create')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Cadastro
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/producao')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Listagem
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview ">
    <a class="nav-link  " href="">
        <i class="fas fa-truck "></i>
        <p>
            Entrega do Leite
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>


    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/entrega/create')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Cadastro
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/entrega')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Listagem
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header ">
    CLINICA
</li>

<li class="nav-item has-treeview ">
    <a class="nav-link  " href="">
        <i class="fas fa-syringe "></i>
        <p>
            Aplicação de Medi.
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/aplicacoes/create')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Cadastro
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/aplicacoes')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Listagem
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header ">
    DIETA
</li>

<li class="nav-item has-treeview ">
    <a class="nav-link  " href="">
        <i class="fas fa-lightbulb "></i>
        <p>
            Desafio de Prod
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/desafio/create')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Cadastro
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link  " href="{{url('painel/desafio')}}">
                <i class="far fa-fw fa-circle "></i>
                <p>
                    Listagem
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header ">
    RELATÓRIOS
</li>

<li class="nav-item">
    <a class="nav-link  " href="{{url('painel/fechamento_dia')}}">
        <i class="fas fa-file-pdf "></i>
        <p>
            Reprodução
        </p>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link  " href="{{url('painel/fechamento_desafio')}}">
        <i class="fas fa-file-pdf "></i>
        <p>
            Desafios
        </p>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link  " href="{{url('painel/fechamento_animais')}}">
        <i class="fas fa-file-pdf "></i>
        <p>
            Animais
        </p>
    </a>
</li>
