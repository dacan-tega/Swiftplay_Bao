<div class="wallet">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="mb-0"><strong>{{trans('includes.PORTFOLIO')}}</strong></h5>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('panel.wallet.hidebalance') }}" class=" float-end">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="balance">
                        <p class="mb-0">{{trans('includes.BALANCE')}}</p>
                        <h1 class="show_balance">
                            @if(auth()->user()->wallet->hide_balance == 1)
                                ****
                            @else
                                <strong class="text-money">{{ \Helper::amountFormatDecimal(auth()->user()->wallet->balance) }}</strong>
                            @endif
                        </h1>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <small>{{trans('includes.Bonus')}}</small>
                            <h5>
                                @if(auth()->user()->wallet->hide_balance == 1)
                                    ****
                                @else
                                    <strong class="text-money">{{ \Helper::amountFormatDecimal(auth()->user()->wallet->balance_bonus) }}</strong>
                                @endif
                            </h5>
                        </div>
                        <div class="col-lg-6">
                            <small>{{trans('includes.Awards')}}</small>
                            <h5>
                                @if(auth()->user()->wallet->hide_balance == 1)
                                    ****
                                @else
                                    <strong class="text-money">{{ \Helper::amountFormatDecimal(auth()->user()->wallet->refer_rewards) }}</strong>
                                @endif
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-grid mt-4">
                                <button data-izimodal-open="#deposit-modal" data-izimodal-zindex="20000" data-izimodal-preventclose="" class="btn btn-outline-success" type="button">{{trans('includes.Deposit')}}</button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-grid mt-4">
                                <button @if(!(auth()->user()->wallet->balance > 0)) disabled="disabled" @endif data-izimodal-open="#withdrawal-modal" data-izimodal-zindex="20000" data-izimodal-preventclose="" class="btn btn-success" type="button">{{trans('includes.TO_WITHDRAW')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('assets/images/pix.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>

@include('includes.deposit')

<div id="withdrawal-modal" class="iziModal" data-izimodal-loop="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="loadingWithdrawal" class="loading-spinner">
                <span class="spinner"></span>
            </div>

            <form id="withdrawalForm" method="post" action="" class="form-login">
                @csrf
                <h5 class="font-bold">{{trans('includes.AVAILABLE_VALUE')}}</h5>
                <h1 class="mb-3 ">{{ \Helper::amountFormatDecimal(auth()->user()->wallet->balance) }}</h1>

                <h5 class="mb-3 mt-5 font-bold">{{trans('includes.ENTER_AMOUNT')}}</h5>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="email">
                        <p class="mb-0">R$</p>
                    </span>
                    <input type="number" name="amount" required min="{{ config('setting')->min_withdrawal }}" max="{{ config('setting')->max_withdrawal }}" class="form-control" placeholder="0,00">
                </div>
                <div class="row">
                    <!-- <div class="col-lg-8 col-sm-12 mb-3">
                        <input type="text" name="chave_pix" class="form-control" required placeholder="{{trans('includes.ENTER_PIX_KEY')}}">
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-3">
                        <select name="tipo_chave" class="form-select " required aria-label="{{trans('includes.Key_Type')}}">
                            <option selected>{{trans('includes.Key_Type')}}</option>
                            <option value="document">CPF/CNPJ</option>
                            <option value="email">E-mail</option>
                            <option value="phoneNumber">{{trans('includes.Telephone')}}</option>
                            <option value="randomKey">{{trans('includes.Random_Key')}}</option> 
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <input type="text" name="document" class="form-control cpf" required placeholder="{{trans('includes.ENTER_CPF')}}">
                    </div>
                </div>
                <div class="alert alert-warning">
                    <p class="mb-0">{{trans('includes.Make_sure')}}</p>
                </div> -->
                <div class="form-check">
                    <input name="accept_terms" required class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{trans('includes.I_ACCEPT')}}
                    </label>
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" class="btn-primary-theme btn-block w-full mb-3">
                        {{trans('includes.TO_WITHDRAW')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('/assets/js/jquery.mask.min.js') }}"></script>
    <script>

        $("#withdrawal-modal").iziModal({
            title: 'Withdraw',
            subtitle: 'Select the amount you wish to withdraw below',
            icon:'fa-solid fa-money-from-bracket',
            headerColor: '#1A1C1F',
            theme: 'dark',  // light
            background:  '#202327',
            width: 700,
            closeOnEscape: false,
            overlayClose: false,
            onFullscreen: function(){},
            onResize: function(){},
            onOpening: function(){
                $('.money2').mask('000.000.000.000.000,00', {reverse: true});
                $('.cpf').mask('000.000.000-00', {reverse: true});
            },
            onOpened: function(){
            },
            onClosing: function(){},
            onClosed: function(){},
            afterRender: function(){}
        });

        /// Withdrawal Form
        document.getElementById('withdrawalForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita o comportamento padrão de envio do formulário

            // Exibe o loading
            const loadingElement = document.getElementById('loadingWithdrawal');
            loadingElement.style.display = 'block';

            const formData = new FormData(this);

            fetch('{{ route('panel.wallet.withdrawal') }}', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if(data.status) {
                        iziToast.show({
                            title: 'Success',
                            message: 'Successfully requested withdrawal',
                            theme: 'dark',
                            icon: 'fa-solid fa-check',
                            iconColor: '#ffffff',
                            backgroundColor: '#23ab0e',
                            position: 'topRight',
                            timeout: 1500,
                            onClosing: function () {},
                            onClosed: function () {
                                $("#withdrawal-modal").iziModal('close');
                                setTimeout(function() {
                                    window.location.replace('{{ route('panel.wallet.withdrawals') }}');
                                }, 1000);
                            }
                        });
                    }else{
                        if(data.error != undefined) {
                            iziToast.show({
                                title: 'Attention',
                                message: data.error,
                                theme: 'dark',
                                icon: 'fa-regular fa-circle-exclamation',
                                iconColor: '#ffffff',
                                backgroundColor: '#b51408',
                                position: 'topRight'
                            });
                        }else{
                            Object.entries(data).forEach(([key, value]) => {
                                iziToast.show({
                                    title: 'Attention',
                                    message: value[0],
                                    theme: 'dark',
                                    icon: 'fa-regular fa-circle-exclamation',
                                    iconColor: '#ffffff',
                                    backgroundColor: '#b51408',
                                    position: 'topRight'
                                });
                            });
                        }

                    }

                    loadingElement.style.display = 'none';
                })
                .catch(error => {
                    loadingElement.style.display = 'none';
                })
                .finally(() => {

                });
        });
    </script>

    <script>

    </script>
@endpush
