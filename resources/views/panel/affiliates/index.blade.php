@extends('layouts.web')

@push('styles')

@endpush

@section('content')
    <div class="container-fluid">
        @include('includes.navbar_top')
        @include('includes.navbar_left')

        <div class="page__content">
            @if(auth()->user()->affiliate_revenue_share == 0 && auth()->user()->affiliate_cpa == 0)
                <section class="affiliate-block">
                    <div class="affiliate-block-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('/assets/images/business_afiliado.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-8">
                                <div class="affiliate-info my-3">
                                    <h1>{{trans('panel.FIND_OUT')}}<span>{{trans('panel.AFFILIATE_PROGRAM')}}</span></h1>
                                    <p>
                                        {{trans('panel.Work_with')}}
                                    </p>
                                    <form action="{{ route('panel.affiliates.join') }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3 mt-3">
                                            <input type="text" name="email" class="form-control" placeholder="Digite seu email" aria-label="Seu e-mail" aria-describedby="affiliate-mail">
                                            <button type="submit" class="input-group-text" id="affiliate-mail"><span class="mx-2">{{trans('panel.Send_now')}}</span> <i class="fa-solid fa-envelope"></i></button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="affiliate-faq">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{trans('panel.How_system')}}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                    {{trans('panel.When_share')}} <strong>{{ config('setting')['software_name'] }}</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{trans('panel.How_referral')}}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{trans('panel.Already')}} <strong>{{ config('setting')['software_name'] }}</strong>{{trans('panel.you_referrals')}}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{trans('panel.my_referral')}}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{trans('panel.yes')}} {{ config('setting')['software_name'] }} {{trans('panel.believes')}} <a href="/painel/affiliates" style="color: #3BC117">{{trans('panel.Affiliate_Dashboard')}}</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <h2 class=" mb-0">{{trans('panel.AFFILIATE_SYSTEM')}}</h2>
                                <p class="mb-0">{{trans('panel.Refer')}} {{auth()->user()->affiliate_revenue_share}}% {{trans('panel.Revenue_share')}}</p>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mt-2">
                                    <div class="input-group mb-3">
                                        <input type="text" id="urlInput" class="form-control" placeholder="" aria-label="" aria-describedby="basic-copy" value="{{ url('/?action=register&affiliate='.$token) }}">
                                        <span class="input-group-text" id="basic-copy">
                                            <a href="#" class="text-green action-copy" onclick="copyToClipboard()">
                                                <i class="fa-regular fa-copy" style="margin-right: 10px;"></i> <span class="ml-2">{{trans('panel.COPY')}}</span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6" style="align-self: center;text-align-last: center;">
                                                <button data-izimodal-open="#affiliate-withdrawal" data-izimodal-zindex="20000" data-izimodal-preventclose="" class="btn-primary-theme btn-block w-full text-white">
                                                {{trans('panel.Rescue')}}
                                                </button>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <h1 class="text-money">{{ \Helper::amountFormatDecimal(auth()->user()->wallet->refer_rewards) }}</h1>
                                                <p>{{trans('panel.AVAILABLE_EARNINGS')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-secundary">
                                    <div class="card-body">
                                        <h1 class="text-money">{{ auth()->user()->affiliate_revenue_share }}%</h1>
                                        <p>{{trans('panel.REVENUE_SHARE')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-secundary">
                                    <div class="card-body">
                                        <h1 class="text-money">{{ \Helper::amountFormatDecimal(auth()->user()->affiliate_cpa) }}</h1>
                                        <p>{{trans('panel.BY_CPA')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wallet-transactions mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">{{trans('panel.NOMINEE_HISTORY')}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">{{trans('panel.Name')}}</th>
                                            <th scope="col">{{trans('panel.Data')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($indications))
                                        @foreach($indications as $indication)
                                            <tr>
                                                <th scope="row">{{ $indication->name }}</th>
                                                <td>{{ $indication->dateHumanReadable }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="flex items-center justify-center text-center py-4" colspan="5">
                                                <h4 class=" mb-0">{{trans('panel.NO_INFORMATION')}}</h4>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            @if($indications->hasPages())
                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="" style="padding: 0 20px;">
                                                {{ $indications->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="wallet-transactions mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">{{trans('panel.CPA_HISTORY')}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col">{{trans('panel.Name')}}</th>
                                        <th scope="col">{{trans('panel.Commission_Paid')}}</th>
                                        <th scope="col">{{trans('panel.Did_deposit?')}}</th>
                                        <th scope="col">{{trans('panel.Data')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($histories))
                                        @foreach($histories->where('commission_type', 'cpa') as $history)
                                            <tr>
                                                <th scope="row">{{ $history->user->name }}</th>
                                                <td>{{ \Helper::amountFormatDecimal($history->commission_paid) }}</td>
                                                <td>
                                                    <span class="badge bg-primary">{{ $history->status }}</span>
                                                </td>
                                                <td>{{ $history->dateHumanReadable }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="flex items-center justify-center text-center py-4" colspan="5">
                                                <h4 class=" mb-0">{{trans('panel.NO_INFORMATION')}}</h4>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            @if($histories->hasPages())
                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="" style="padding: 0 20px;">
                                                {{ $histories->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="wallet-transactions mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">{{trans('panel.REVENUE_SHARE')}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col">{{trans('panel.Name')}}</th>
                                        <th scope="col">{{trans('panel.Commission_Paid')}}</th>
                                        <th scope="col">{{trans('panel.Type')}}</th>
                                        <th scope="col">{{trans('panel.Number_Losses')}}</th>
                                        <th scope="col">{{trans('panel.Value_Losses')}}</th>
                                        <th scope="col">{{trans('panel.Did_deposit?')}}</th>
                                        <th scope="col">{{trans('panel.Data')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($histories))
                                            @foreach($histories->where('commission_type', 'revshare') as $history)
                                                <tr>
                                                    <th scope="row">{{ $history->user->name }}</th>
                                                    <td>{{ \Helper::amountFormatDecimal($history->commission_paid) }}</td>
                                                    <td>{{ $history->commission_type }}</td>
                                                    <td>{{ $history->losses }}</td>
                                                    <td>{{ \Helper::amountFormatDecimal($history->losses_amount) }}</td>
                                                    <td>
                                                        <span class="badge bg-primary">{{ $history->status }}</span>
                                                    </td>
                                                    <td>{{ $history->dateHumanReadable }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="flex items-center justify-center text-center py-4" colspan="5">
                                                    <h4 class=" mb-0">{{trans('panel.NO_INFORMATION')}}</h4>
                                                </td>
                                            </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            @if($histories->hasPages())
                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="" style="padding: 0 20px;">
                                                {{ $histories->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endif
        </div>

        <div id="affiliate-withdrawal" class="iziModal" data-izimodal-loop="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="loadingAffiliateWithdrawal" class="loading-spinner">
                        <span class="spinner"></span>
                    </div>

                    <div class="affiliate-withdrawal-container">
                        <div class="affiliate-withdrawal-body">
                            <p>{{trans('panel.confirming')}}</p>
                        </div>

                        <button class="btn-primary-theme btn-block w-full request-affiliate-withdrawal">
                            {{trans('panel.REQUEST')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#affiliate-withdrawal").iziModal({
            title: 'Withdraw',
            subtitle: 'Let\'s withdraw our commission',
            icon:'fa-solid fa-money-bill-transfer',
            headerColor: '#1A1C1F',
            theme: 'dark',  // light
            background:  '#202327',
            width: 700,
            closeOnEscape: false,
            overlayClose: false,
            onFullscreen: function(){},
            onResize: function(){},
            onOpening: function(){

            },
            onOpened: function(){
            },
            onClosing: function(){},
            onClosed: function(){

            },
            afterRender: function(){}
        });

        /**
         * Copy to Clipboard
         */
        function copyToClipboard() {
            const input = document.getElementById('urlInput');
            input.select();
            document.execCommand('copy');

            iziToast.show({
                title: 'Success',
                message: 'URL copied to clipboard.',
                theme: 'dark',
                icon: 'fa-solid fa-check',
                iconColor: '#ffffff',
                backgroundColor: '#23ab0e',
                position: 'topRight',
                onClosing: function () {},
                onClosed: function () {

                }
            });
        }

        /**
         * Request Affiliate Withdrawak
         */
        $(document).on('click', '.request-affiliate-withdrawal', function(event) {
            event.preventDefault();

            const loadingElement = document.getElementById('loadingAffiliateWithdrawal');
            loadingElement.style.display = 'block';

            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            fetch('{{ url('painel/affiliates/withdrawal') }}', {
                    method: 'post',
                    body: JSON.stringify({}),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.status) {

                        iziToast.show({
                            title: 'Success',
                            message: 'The conversion completed successfully.',
                            theme: 'dark',
                            icon: 'fa-solid fa-check',
                            iconColor: '#ffffff',
                            backgroundColor: '#23ab0e',
                            position: 'topRight',
                            timeout: 1500,
                            onClosing: function () {},
                            onClosed: function () {
                                $("#affiliate-withdrawal").iziModal('close');
                                setTimeout(function() {
                                    window.location.replace('{{ url('/painel/wallet/withdrawals') }}');
                                }, 1000);
                            }
                        });

                        loadingElement.style.display = 'none';
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
@endpush
