<template>
    <div class="h-full">
        <main class="mx-auto max-w-7xl pb-10 lg:px-8 lg:py-12">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                <div class="space-y-6 sm:px-6 lg:col-span-12 lg:px-0">
                    <!-- Profile details -->
                    <section aria-labelledby="payment-details-heading">
                        <form @submit.prevent="form.patch('user')">
                            <div
                                class="shadow sm:overflow-hidden sm:rounded-md"
                            >
                                <div class="bg-white px-4 py-6 sm:p-6">
                                    <div>
                                        <h2
                                            id="payment-details-heading"
                                            class="text-lg font-medium leading-6 text-gray-900"
                                        >
                                            Profile details
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Update your profile information.
                                        </p>
                                    </div>

                                    <div class="mt-6 grid grid-cols-4 gap-6">
                                        <div class="col-span-4 sm:col-span-2">
                                            <label
                                                for="name"
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                >Name</label
                                            >
                                            <input
                                                type="text"
                                                name="name"
                                                id="name"
                                                v-model="form.name"
                                                autocomplete="cc-given-name"
                                                class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6"
                                            />
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label
                                                for="email-address"
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                >Email address</label
                                            >
                                            <input
                                                type="text"
                                                name="email-address"
                                                id="email-address"
                                                disabled
                                                v-model="form.email"
                                                autocomplete="email"
                                                class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 text-right sm:px-6"
                                >
                                    <button
                                        type="submit"
                                        class="inline-flex justify-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Plan -->
                    <section aria-labelledby="plan-heading">
                        <form @submit.prevent="planForm.patch('subscribe')">
                            <div
                                class="shadow sm:overflow-hidden sm:rounded-md"
                            >
                                <div
                                    class="space-y-6 bg-white px-4 py-6 sm:p-6"
                                >
                                    <div>
                                        <h2
                                            id="plan-heading"
                                            class="text-lg font-medium leading-6 text-gray-900"
                                        >
                                            Plan
                                        </h2>
                                    </div>

                                    <RadioGroup
                                        :disabled="endsAt"
                                        v-model="planForm.plan"
                                    >
                                        <RadioGroupLabel class="sr-only">
                                            Pricing plans
                                        </RadioGroupLabel>
                                        <div
                                            class="relative -space-y-px rounded-md bg-white"
                                        >
                                            <RadioGroupOption
                                                as="template"
                                                v-for="(plan, planIdx) in plans"
                                                :key="plan.name"
                                                :value="plan"
                                                v-slot="{ checked, active }"
                                            >
                                                <div
                                                    :class="[
                                                        planIdx === 0
                                                            ? 'rounded-tl-md rounded-tr-md'
                                                            : '',
                                                        planIdx ===
                                                        plans.length - 1
                                                            ? 'rounded-bl-md rounded-br-md'
                                                            : '',
                                                        checked
                                                            ? 'z-10 border-orange-200 bg-orange-50'
                                                            : 'border-gray-200',
                                                        'relative flex cursor-pointer flex-col border p-4 focus:outline-none md:grid md:grid-cols-3 md:pr-6',
                                                    ]"
                                                >
                                                    <span
                                                        class="flex items-center text-sm"
                                                    >
                                                        <span
                                                            :class="[
                                                                checked
                                                                    ? 'bg-orange-500 border-transparent'
                                                                    : 'bg-white border-gray-300',
                                                                active
                                                                    ? 'ring-2 ring-offset-2 ring-gray-900'
                                                                    : '',
                                                                'h-4 w-4 rounded-full border flex items-center justify-center',
                                                            ]"
                                                            aria-hidden="true"
                                                        >
                                                            <span
                                                                class="rounded-full bg-white w-1.5 h-1.5"
                                                            />
                                                        </span>
                                                        <RadioGroupLabel
                                                            as="span"
                                                            class="ml-3 font-medium text-gray-900"
                                                            >{{
                                                                plan.name
                                                            }}</RadioGroupLabel
                                                        >
                                                    </span>
                                                    <RadioGroupDescription
                                                        as="span"
                                                        class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center"
                                                    >
                                                        <span
                                                            :class="[
                                                                checked
                                                                    ? 'text-orange-900'
                                                                    : 'text-gray-900',
                                                                'font-medium',
                                                            ]"
                                                            >${{
                                                                plan.priceMonthly
                                                            }}
                                                            / mo</span
                                                        >
                                                        {{ " " }}
                                                        <span
                                                            :class="
                                                                checked
                                                                    ? 'text-orange-700'
                                                                    : 'text-gray-500'
                                                            "
                                                            >(${{
                                                                plan.priceYearly
                                                            }}
                                                            / yr)</span
                                                        >
                                                    </RadioGroupDescription>
                                                    <RadioGroupDescription
                                                        as="span"
                                                        :class="[
                                                            checked
                                                                ? 'text-orange-700'
                                                                : 'text-gray-500',
                                                            'ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right',
                                                        ]"
                                                        >{{
                                                            plan.limit
                                                        }}</RadioGroupDescription
                                                    >
                                                </div>
                                            </RadioGroupOption>
                                        </div>
                                    </RadioGroup>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 flex justify-between sm:px-6"
                                >
                                    <div>
                                        <div v-if="endsAt">
                                            You will move to free plan after
                                            {{ endsAt }}

                                            <button
                                                @click="resume"
                                                type="button"
                                                class="inline-flex justify-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900"
                                            >
                                                Resume
                                            </button>
                                        </div>
                                    </div>
                                    <button
                                        type="submit"
                                        class="inline-flex justify-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>

                    <!-- Billing history -->
                    <section aria-labelledby="billing-history-heading">
                        <div
                            class="bg-white pt-6 shadow sm:overflow-hidden sm:rounded-md"
                        >
                            <div class="px-4 sm:px-6">
                                <h2
                                    id="billing-history-heading"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Billing history
                                </h2>
                            </div>
                            <div class="mt-6 flex flex-col">
                                <div
                                    class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                                >
                                    <div
                                        class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                                    >
                                        <div
                                            class="overflow-hidden border-t border-gray-200"
                                        >
                                            <table
                                                class="min-w-full divide-y divide-gray-200"
                                            >
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-left text-sm font-semibold text-gray-900"
                                                        >
                                                            Date
                                                        </th>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-left text-sm font-semibold text-gray-900"
                                                        >
                                                            Description
                                                        </th>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-left text-sm font-semibold text-gray-900"
                                                        >
                                                            Amount
                                                        </th>
                                                        <!--
                                `relative` is added here due to a weird bug in Safari that causes `sr-only` headings to introduce overflow on the body on mobile.
                              -->
                                                        <th
                                                            scope="col"
                                                            class="relative px-6 py-3 text-left text-sm font-medium text-gray-500"
                                                        >
                                                            <span
                                                                class="sr-only"
                                                                >View
                                                                receipt</span
                                                            >
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="divide-y divide-gray-200 bg-white"
                                                >
                                                    <tr
                                                        v-for="invoice in invoices"
                                                        :key="invoice.id"
                                                    >
                                                        <td
                                                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900"
                                                        >
                                                            <time
                                                                :datetime="
                                                                    invoice.created
                                                                "
                                                                >{{
                                                                    dayjs
                                                                        .unix(
                                                                            invoice.created
                                                                        )
                                                                        .format(
                                                                            "YYYY - MMM - DD"
                                                                        )
                                                                }}</time
                                                            >
                                                        </td>
                                                        <td
                                                            class="whitespace-nowrap px-6 py-4 text-sm text-gray-500"
                                                        >
                                                            {{
                                                                invoice.billing_reason
                                                            }}
                                                        </td>
                                                        <td
                                                            class="whitespace-nowrap px-6 py-4 text-sm text-gray-500"
                                                        >
                                                            ${{
                                                                invoice.total /
                                                                100
                                                            }}
                                                        </td>
                                                        <td
                                                            class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium"
                                                        >
                                                            <a
                                                                :href="
                                                                    invoice.invoice_pdf
                                                                "
                                                                target="_blank"
                                                                class="text-orange-600 hover:text-orange-900"
                                                                >View receipt</a
                                                            >
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
} from "@headlessui/vue";
import { router, useForm } from "@inertiajs/vue3";
import { computed } from "@vue/reactivity";
import dayjs from "dayjs";

const plans = [
    {
        name: "Free Plan",
        value: "free",
        priceMonthly: 0,
        priceYearly: 0,
        limit: "Up to 1 active site monitoring",
    },
    {
        name: "Pro Plan",
        value: "pro",
        priceMonthly: 9,
        priceYearly: 90,
        limit: "Up to 100 active site monitoring",
    },
];
const props = defineProps(["auth", "invoices"]);

const planForm = useForm({
    plan: props.auth.user.subscription.isSubscribed ? plans[1] : plans[0],
});

const form = useForm({
    email: props.auth.user.email,
    name: props.auth.user.name,
});

const endsAt = computed(() => {
    return props.auth.user.subscription.ends_at;
});

function resume() {
    router.post("subscription/resume");
}
</script>
