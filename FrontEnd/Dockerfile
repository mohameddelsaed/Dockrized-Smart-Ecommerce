FROM node:22-alpine AS base

ENV PNPM_HOME="/pnpm"

ENV PATH="$PNPM_HOME:$PATH"

RUN corepack enable

WORKDIR /app


# install deps (deps stage)

FROM base AS deps

COPY package.json pnpm-lock.yaml pnpm-workspace.yaml ./


RUN --mount=type=cache,id=pnpm,target=/pnpm/store \
    pnpm install --frozen-lockfile
# (builder stage)

FROM base AS builder 

# to take files from deps stage to builder 
COPY --from=deps /app/node_modules ./node_modules

COPY . .

RUN pnpm build 

# (runner stage)

FROM node:22-alpine AS runner

WORKDIR /app

ENV NODE_ENV=production


ENV PORT=3000

ENV HOSTNAME=0.0.0.0

# to take production file from builder 
COPY --from=builder /app/.next/standalone ./

COPY --from=builder /app/.next/static ./.next/static

COPY --from=builder /app/public ./public

EXPOSE 3000

CMD ["node", "server.js"]
